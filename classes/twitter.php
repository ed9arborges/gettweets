<?php
class twitter
{	var $screen_name;
	var $url_options;
	function twitter($name)
	{	$this->screen_name=$name;
	}
	public function gettweets($file)
	{	$url=$file.'?screen_name='.$this->screen_name.$this->url_options;		
		$data=$this->get_decoded_contents($url);
		if($data)
			return $data;
		else
			return $this->err_no_name();
	}
	public function set_url_options($val) //may be EXTENDED to receive count and is retweeted arguments
	{	$this->url_options=$val;
	}
	private function get_decoded_contents($url) //get content from API URL and decode it
	{	
		$headers = @get_headers($url);
		if (preg_match("|200|", $headers[0])) //avoid warnings cheking if url exists
			$response=file_get_contents($url);
		else
			return false;
		if($response)
			return json_decode($response);
		else
			return false;
	}
	private function err_no_name()
	{	print 'Invalid screen name, first argument should be an unprotected twitter screen name'."\n";
		return false;
	}
}