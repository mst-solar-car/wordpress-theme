<?php
/**
 * Theme Editor
 *
 * @author Michael Rouse
 * Allows for editing of the current theme files
 */
?>
<?php
add_action( 'admin_menu', function(){
	add_theme_page( 'Theme Editor (Advanced)', 'Editor (Advanced)', 'edit_theme_options', 'themeeditor', 'sct_theme_editor' );
} );




/**
 * Creates the Page
 */
function sct_theme_editor () {
  $themeDir = get_template_directory(); // The root of the current theme directory

  $hasFilePost = false;

  if (!isset($_GET['file']))
  {
    $file = '';
  }
  else
  {
    $file = '/'.$_GET['file'];
    $hasFilePost = true;
  }

  echo '<br/><br/><span style="font-size: 25px; color: #FF0000">CAUTION: this feature is only for people who know what they are doing. If you break something, you will have to explain why you were being dumb to support.</span><br/><br/>';

  $path = str_replace('../', '', $themeDir. $file); // Safety


  if (is_dir($path))
  {
    // Show a directory
    if ($handle = opendir($path)) {

      /* This is the correct way to loop over the directory. */
      while (false !== ($entry = readdir($handle))) {
        if ($entry == '..' || ($path == $themeDir && $entry == '.'))
        {
          // Do nothing
        }else{
          if (is_dir($path."/".$entry))
          {
            // Display as a directory
            ?><a href="<?=$_SERVER['REQUEST_URI']."&file=".urlencode($entry)?>"><?=$entry?>/</a><br/><?
          }
          else
          {
            // It is a file

            ?><a href="<?=$_SERVER['REQUEST_URI']."&file=".urlencode($file.'/'.$entry)?>"><?=$entry?></a><br/><?
          }
        }
      }
    }
  }
  else
  {
    // Show a file for editing
    if (isset($_POST))
    {
        $newContents = $_POST['contents'];

        if (isset($_POST['contents']))
        {
          file_put_contents($path, stripslashes($newContents));
          echo "<h1>Saved!</h1>";
        }
    }

    $contents = file_get_contents($path);
    ?><h1>Editing <?=$file?></h1><form action="" method="post"><textarea style="width:80vw;height:80vh;" name="contents"><?=htmlspecialchars($contents)?></textarea><br/><br/><span style="font-size: 20px; color: #FF0000">Seriously, don't hit this button until you are 100% positive that the code above will not break anything</span><br/><input type="submit" value="Save"></form><?php
  }


}
