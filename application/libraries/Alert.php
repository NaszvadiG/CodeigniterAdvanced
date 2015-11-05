<?php
	class Alert 
	{
		private function show($title, $content,$type)
		{
			$html = '<div class="alert alert-'.$type.'">';
			if(!empty($title))
			{
				$html .= '<strong>'.$title.'</strong>';
			}
			$html .= '<p>'.$content.'</p>';
			$html .= '</div>';
			return $html;
		}
		public function danger($title, $content)
		{
			return $this->show('<i class="fa fa-exclamation-triangle"></i> '.$title, $content, "danger");
		}
		public function error($title, $content)
		{
			return $this->show($title, $content, "danger");
		}
		public function success($title, $content)
		{
			return $this->show($title, $content, "success");	
		}
		public function info($title, $content)
		{
			return $this->show($title, $content, "info");	
		}
		public function warning($title, $content)
		{
			return $this->show('<i class="fa fa-exclamation-triangle"></i> '.$title, $content, "warning");
		}
	}
?>