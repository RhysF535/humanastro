<!-- from: https://stackoverflow.com/a/33965562 -->
<!-- example 2 -->
<?php
if (isset($_POST['submit'])) {

    $writeComment = implode('', file('test.txt')) . '[!@X#$]'. $_POST['data'];
    $myfile = fopen("test.txt", "w") or die("Unable to open file!");

    fwrite($myfile, rtrim($writeComment, '[!@X#$]'));
    fclose($myfile);
}

$fileContent = implode('', file('test.txt'));
$comments = explode('[!@X#$]', rtrim($fileContent, '[!@X#$]'));

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8" />
    <title>Submit Data</title>
</head>
<body>

    <form id="input" action="" method="post">
        Comment: <textarea name="data" cols="100" rows="10">
            Name: 
            Address: 
            Email: 
            Phone: 
            ---------------------------------------------
        </textarea>
        <input type="submit" name="submit" value="Submit">
    </form>
    <table>
        <?php foreach ($comments as $i => $comment) { ?>
        <tr>
            <td>
                Comment(<?php echo ($i + 1)?>):
            </td>
            <td>
                <?php echo $comment;?>
            </tr>
        </td>
        <?php }?>
    </table>
    <a href="test.txt">View Core File</a>
</body>
</html>