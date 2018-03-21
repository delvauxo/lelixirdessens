<!-- Placeholder for the loader (style it as you wish)-->
<div id="loader2" style="display: none;  position: fixed; top: 50%; left: 50%; z-index: 1234; overflow: auto; text-align:center; width: 400px; height: 500px; margin-left: -200px; margin-top: -176px; "><p>Merci de patienter pendant le chargement de la page</p><img src="http://www.vanandvan.be/nl/webroot/img/loading/loading.gif"></div>
<!-- Div with the id "content" to hide the content before showing the loader...-->
<div  id="content2" style="display:table; border: 2px solid pink; width: 100%; border-spacing: 3px;">

<div class="page-header">
	<h1><?php echo isset($post->file_tmb)?'Editer':'Ajouter'; ?> un client :</h1>
</div>

<form action="<?php echo Router::url('admin/customers/edit/'.$id); ?>" method="post" onSubmit="uploading();">
	<?php echo $this->Form->input('societe','Societe'); ?>
	<?php echo $this->Form->input('nom','Nom'); ?>
	<?php echo $this->Form->input('prenom','Prenom'); ?>
	<?php echo $this->Form->input('rue','Rue'); ?>
	<?php echo $this->Form->input('codep','Code Postal'); ?>
	<?php echo $this->Form->input('pays','Pays'); ?>
	<?php echo $this->Form->input('email','E-mail'); ?>
	<?php echo $this->Form->input('fixe','Fixe'); ?>
	<?php echo $this->Form->input('mobile','Mobile'); ?>
	<?php echo $this->Form->input('website','Website'); ?>
	<?php echo $this->Form->input('secteur','Secteur Activite'); ?>
	<?php echo $this->Form->input('tracking','Tracking',array('type'=>'textarea','class'=>'xxlarge wysiwyg','rows'=>5)); ?>
	<?php echo $this->Form->input('id','hidden'); ?>
	<div class="actions">
		<input type="submit" class="btn primary" value="Envoyer">
	</div>
</form>

</div>


<script type="text/javascript" src="<?php echo Router::webroot('js/tinymce/tiny_mce.js'); ?>"></script>
<script type="text/javascript">

      tinyMCE.init({
        forced_root_block : "",

        // General options
        mode : "specific_textareas",
        editor_selector : "wysiwyg",
        theme : "advanced",
        relative_urls : false,

        plugins : "autolink,lists,spellchecker,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template",

        // Theme options
        theme_advanced_buttons1 : "bold,italic,underline,strikethrough,|,bullist,numlist,|,justifyleft,justifycenter,justifyright,justifyfull,|,link,unlink,image,media,|,fullscreen",
        theme_advanced_buttons2 : "",
        theme_advanced_buttons3 : "",
        theme_advanced_buttons4 : "",
        theme_advanced_toolbar_location : "top",
        theme_advanced_toolbar_align : "left",
        theme_advanced_statusbar_location : "bottom",
        theme_advanced_resizing : true,

        // Skin options
        skin : "o2k7",
        skin_variant : "silver",
        file_browser_callback : 'fileBrowser'
    });

    function fileBrowser(field_name, url, type, win){
      if(type=="file"){
          var explorer = "<?php echo Router::url('admin/posts/tinymce'); ?>";
      }else{
          var explorer = "<?php echo Router::url('admin/medias/index/'.$id); ?>";
      }
      tinyMCE.activeEditor.windowManager.open({
        file : explorer,
        title : "Gallerie",
        width: 420,
        height: 400,
        inline : "yes",
        close_previous : "no"
      },{
        window : win,
        input : field_name,
        resizable : "yes" 
      });
      return false; 
    }
</script>