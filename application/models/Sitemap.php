<?php

class Sitemap extends CI_Model {

    private $html = '<?xml version="1.0" encoding="UTF-8"?>';

    public function __construct() {
        @unlink($this->file);
        $this->html .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" 
  xmlns:image="http://www.google.com/schemas/sitemap-image/1.1">' . "\n ";
    }

    public function addURL($url) {
        $this->html .= '<url>
					    <loc>' . $url . '</loc> 
					  </url>';
    }

    public function addImageURL($url, $images) {
        $this->html .= '
<url>
	<loc>
		' . $url . '
	</loc>
	';
        foreach ($images as $image) {
            $this->html .= '
	<image:image>
		<image:loc>
			' . $image . '
		</image:loc>
	</image:image>
	';
        }
        $this->html .= '
</url>
 ';
    }

    public function comment($str) {
        $this->html .= '<!-- ' . $str . '-->';
    }

    private function close() {
        $this->html .= '</urlset>';
    }

    public function show() {
        $this->close();
        return $this->html;
    }

}

?>