<?php

echo <<< HTMLEND
	<body>
	<form action="php/file_upload.php" method="post" enctype="multipart/form-data" />
		<input type="hidden" name="MAX_FILE_SIZE" value="2000000" />
		<label for="userfile">Upload a file:</label>
		<input type="file" name="userfile" id="userfile" /><br />
		<input type="submit" value="Upload File" />
	</form>
	</body>


HTMLEND

?>