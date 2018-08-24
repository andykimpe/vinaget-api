<?php
if (!defined('RAPIDLEECH')) {
    require_once 'index.html';
    exit;
}
class dl_free_fr extends DownloadClass
{
    public function Download($link)
    {
		$linkfinal = "http://yourvinagetdomaine/yourfolder/api.php?url=".urlencode($link)."&password=yourpassword";
        $page = $this->GetPage($linkfinal);
        $filename = parse_url($linkfinal);
        $filename = basename($filename['path']);
        $this->RedirectDownload($linkfinal, $filename, $cookie, 0, $linkfinal);
    }
}

?>
