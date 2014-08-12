<!DOCTYPE html>                                                                                                                        
<html>
    <head>
        <title>File Uploader</title>
        <link type="text/css" rel="stylesheet" href="style.css" />
    </head>
<body>
<?php
    $bool = false;
    $destination = "files/"; 
    if ( !empty( $_FILES ) ) {
        $tmpname = $_FILES[ 'upfile' ][ 'tmp_name' ];
        $destination .= $_FILES[ 'upfile' ][ 'name' ];
        if ( $_FILES[ 'upfile' ][ 'error' ] == 0 ) {        
            $bool = move_uploaded_file( $tmpname , $destination );
        }
    }
?>

<?php 
    if ( $bool ) {
?>
    <h1>SUCCESS</h1>      
    <p>
        File succesfully uploaded. You can access it <a href="<?php echo 'files/'.$_FILES[ 'upfile' ][ 'name' ]; ?>" >here</a>.
    </p>

<?php
    }
    else {
?>
    <h1>FAIL</h1>      
    <p>
        File not succesfully uploaded or you didn't select a file for upload.<br/> Please try again.
    </p>

<?php
    }
?>

    </body>
</html>
