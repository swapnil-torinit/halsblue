<?php ob_start();
$dir= "./";
 $file=$_REQUEST['action'];
   //First, see if the file exists
	//echo "dir==".$dir."file==".$file;
   if (!file_exists($dir.$file)) { die("<b>404 File not found!</b>"); }
   //Gather relevent info about file
   $len = filesize($dir.$file);
   $filename = basename($dir.$file);
   $file_extension = strtolower(substr(strrchr($filename,"."),1));
   //This will set the Content-Type to the appropriate setting for the file
   switch( $file_extension ) {
     case "pdf": $ctype="application/pdf"; break;
     case "exe": $ctype="application/octet-stream"; break;
     case "zip": $ctype="application/zip"; break;
     case "doc": $ctype="application/msword"; break;
     case "xls": $ctype="application/vnd.ms-excel"; break;
     case "ppt": $ctype="application/vnd.ms-powerpoint"; break;
     case "gif": $ctype="image/gif"; break;
     case "png": $ctype="image/png"; break;
     case "jpeg": $ctype="image/jpeg"; break;
     case "jpg": $ctype="image/jpg"; break;
	 case "JPEG": $ctype="image/JPEG"; break;
     case "JPG": $ctype="image/JPG"; break;
     case "mp3": $ctype="audio/mpeg"; break;
     case "wav": $ctype="audio/x-wav"; break;
     case "mpeg":
     case "mpg":
     case "mpe": $ctype="video/mpeg"; break;
     case "mov": $ctype="video/quicktime"; break;
     case "avi": $ctype="video/x-msvideo"; break;
	 case "txt": $ctype="text"; break;
     //The following are for extensions that shouldn't be downloaded (sensitive stuff, like php files)
     case "php":
     case "htm":
     case "html":
     case "txt": die("<b>Cannot be used for ". $file_extension ." files!</b>"); break;
     default: $ctype="application/force-download";
   }
   //Begin writing headers
   header("Pragma: public");
   header("Expires: 0");
   header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
   header("Cache-Control: public");
   header("Content-Description: File Transfer");
  
   //Use the switch-generated Content-Type
   header("Content-Type: $ctype");
   //Force the download
   $header="Content-Disposition: attachment; filename=".$filename.";";
   header($header );
   header("Content-Transfer-Encoding: binary");
   header("Content-Length: ".$len);
   @readfile($dir.$file);
   exit;
?>
