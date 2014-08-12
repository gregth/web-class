<!DOCTYPE html>
<html>
    <head>
        <title>File Uploader</title>
        <link type="text/css" rel="stylesheet" href="style.css" />
    </head>
    <body>
        <h1>File uploader</h1>
        <p>This is a simple file uploader.</p>
        <form method="post" action="uploader.php" enctype="multipart/form-data" >
            Upload your own file here:
            <input name="upfile" type="file" />
            <input type="submit" value="Upload now" />
        </form>
        <h3>Files uploaded by users:</h3>
        <?php 
            $dir_path = 'files';
            $handle = opendir( $dir_path );
            $files = []; 
            while ( ( $file = readdir( $handle ) ) !== FALSE ) {
                if ( $file != '.' &&  $file != '..' ) {
                    $files[] = $file;
                }
            }
            if ( !empty( $files ) ) {
                echo '<ul>';
                foreach ( $files as $name ) {
                    $link = 'files/'.$name;
                    echo '<li><a href="'.$link.'" >'.$name.'</li></a>';
                }
                echo '</ul>';
            }
            else {
                echo '<p>There are no files uploaded yet.</p>';
            }
        ?>
    </body>
</html>
