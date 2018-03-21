<!-- Placeholder for the loader (style it as you wish)-->
<div id="loader2" style="display: none;  position: fixed; top: 50%; left: 50%; z-index: 1234; overflow: auto; text-align:center; width: 400px; height: 500px; margin-left: -200px; margin-top: -176px; "><p>Merci de patienter pendant le chargement de la page</p><img src="http://www.vanandvan.be/nl/webroot/img/loading/loading.gif"></div>
<!-- Div with the id "content" to hide the content before showing the loader...-->
<div  id="content2" class="box" style="display:table;">

<div style="padding: 20px;">
  <h1><span class="edit">&#x41;</span><?php echo isset($post->file)?'Editer':'Ajouter'; ?> une valeur ajoutée :</h1>

<form action="<?php echo Router::url('admin/valeurs/edit/'.$id); ?>" method="post" enctype="multipart/form-data" onSubmit="uploading();">
<!-- Collapse FORM
================================================== -->
<div class="accordion" id="accordion2" style="width: 100%;">
  <div class="accordion-group">
    <div class="accordion-heading">
    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
      <span class="illustration">&#xe008;</span>
      <span class="titleslide">Titre</span>
      <span class="slidedown">&#xe005;</span>
    </a>
    </div>
    <div id="collapseOne" class="accordion-body collapse in">
      <div class="accordion-inner">
        <?php echo $this->Form->input('titre_fr','Titre Francais'); ?>
        <?php echo $this->Form->input('titre_nl','Titre Néerlandais'); ?>
      </div>
    </div>
  </div>
  <div class="accordion-group">
    <div class="accordion-heading">
    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">
      <span class="illustration">&#x56;</span>
      <span class="titleslide">Image</span>
      <span class="slidedown">&#xe005;</span>
    </a>
    </div>
    <div id="collapseTwo" class="accordion-body collapse">
      <div class="accordion-inner">
        <div class="picinfo">
          <span class="picsize">
          &#x2e;
          </span>
          <span style="padding-left: 15px;">
          <b>Taille recommandée</b>
          </span>
          <span style="padding-left: 15px; font-style: italic;">
          largeur : <b>250px</b> / hauteur : <b>130px</b>
          </span>
        </div>        
        <?php echo $this->Form->input('file','Image',array('type'=>'file')); ?>
      </div>
    </div>
  </div>
  <div class="accordion-group">
    <div class="accordion-heading">
    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseThree">
      <span class="illustration">&#xe016;</span>
      <span class="titleslide">Texte</span>
      <span class="slidedown">&#xe005;</span>
    </a>
    </div>
    <div id="collapseThree" class="accordion-body collapse">
      <div class="accordion-inner">
        <?php echo $this->Form->input('texte_fr','Texte Francais',array('type'=>'textarea','class'=>'xxlarge wysiwyg','rows'=>5)); ?>
        <?php echo $this->Form->input('texte_nl','Texte Néerlandais',array('type'=>'textarea','class'=>'xxlarge wysiwyg','rows'=>5)); ?>
      </div>
    </div>
  </div>
</div>


        <?php echo $this->Form->input('id','hidden'); ?>
  <div style="text-align: left; float: left;">
    <button type="button" onclick="JavaScript:document.location='<?php echo Router::url('admin/posts/index'); ?>'">Prévisualiser</button>
  </div>
  <div style="text-align: right;">
    <button type="submit">Enregistrer</button>
    <button type="button" onclick="JavaScript:document.location='<?php echo Router::url('admin/valeurs/index'); ?>'">Annuler</button>
  </div>
</form>

</div>
</div>


<script type="text/javascript" src="<?php echo Router::webroot('js/tinymce/tiny_mce.js'); ?>"></script>
<script type="text/javascript">

      tinyMCE.init({
        // General options
        mode : "specific_textareas",
        editor_selector : "wysiwyg",
        theme : "advanced",
        relative_urls : false,
        width : "100%",
        height: "100", 

        plugins : "autolink,lists,spellchecker,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template",

        // Theme options
        theme_advanced_buttons1 : "bold,italic,underline,strikethrough,|,bullist,numlist,|,justifyleft,justifycenter,justifyright,justifyfull,|,link,unlink,image,media,|,fullscreen",
        theme_advanced_buttons2 : "",
        theme_advanced_buttons3 : "",
        theme_advanced_buttons4 : "",
        theme_advanced_toolbar_location : "top",
        theme_advanced_toolbar_align : "left",
        theme_advanced_statusbar_location : "bottom",
        theme_advanced_resizing : false,

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