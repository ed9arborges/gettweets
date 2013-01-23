<?php
class writer
{	
	public function wr_file($argm,$src_data)
	{	if($src_data)
		{	foreach ($src_data as $key=>$thevalues)
			{	
			  $txt_data .= $thevalues->text."\r\n";
			$key++;
			}
			$this->put_file($argm.'.txt',$txt_data);
			unset($thevalues);
		}
	}
	private function put_file($argm,$text)
	{	if (file_put_contents($argm,$text))
			print 'File '.$argm.' created'."\n";
		else
			print 'Error creating file'."\n";
					
	}
	public function wr_db()
	{///data base option
	}
}