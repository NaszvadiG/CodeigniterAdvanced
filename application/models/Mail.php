<?php

class Mail extends CI_Model {

    public function subscribe($users_email, $token) {
        $users_token = $this->config->base_url() . "token/index/" . $token;
        $message = '<span style="font-family:\'Helvetica Neue Light\',Helvetica,Arial,sans-serif;color:#66757f;font-size:28px;padding:0px;margin:0px;font-weight:300;line-height:100%;text-align:left">Dernière étape...</span><br /><br />';
        $message .= 'Confirmez votre adresse email afin de compléter votre compte Majoradom. C\'est simple : il suffit de cliquer sur le bouton ci-dessous. ';
        $message .= '<a href="' . $users_token . '" style="border-style:none;text-decoration:none;color:#ff0000;font-size:14px;letter-spacing:0.02em;font-weight:bold;white-space:nowrap;overflow:hidden;padding:0px;margin:0px;font-family:\'Helvetica Neue\',Helvetica,Arial,sans-serif;line-height:14px;text-decoration:none;border-style:none;border:0;padding:0;margin:0" target="_blank"> <span style="border-style:none;text-decoration:none;color:#0000ff;line-height:100%">Confirmer maintenant </span> </a>
			';
        return $this->__send($users_email, "Majoradom : Inscription", $message);
    }
    
    public function updatePassword($users_email) {
        $message = "";
        return $this->__send($users_email, "Majoradom : Nouveau message", $message);
    }

    public function forgetPassword($user, $token) {
        $users_token = $this->config->base_url() . "token/index/" . $token;
        $message = '<span style="font-family:\'Helvetica Neue Light\',Helvetica,Arial,sans-serif;color:#66757f;font-size:28px;padding:0px;margin:0px;font-weight:300;line-height:100%;text-align:left">Mot de passe oublié...</span><br /><br />';
        $message .= 'Cliquez sur le lien ci-contre pour redéfinir votre mot de passe.';
        $message .= '<a href="' . $users_token . '" style="border-style:none;text-decoration:none;color:#ff0000;font-size:14px;letter-spacing:0.02em;font-weight:bold;white-space:nowrap;overflow:hidden;padding:0px;margin:0px;font-family:\'Helvetica Neue\',Helvetica,Arial,sans-serif;line-height:14px;text-decoration:none;border-style:none;border:0;padding:0;margin:0" target="_blank"> <span style="border-style:none;text-decoration:none;color:#0000ff;line-height:100%">Redéfinir un nouveau mot de passe</span> </a>
			';
        return $this->__send($user->users_email, "Majoradom : Mot de passe oublié", $message);
    }

        public function __send($users_email, $subject, $content) {
        $this->load->library('email');
        $this->email->from('no-reply@majoradom.com', 'Service Majoradom');
        $this->email->to($users_email);
        $this->email->subject($subject);
        $this->email->message($this->_html($content));
        $this->email->mailtype = "html";
        return $this->email->send();
    }

    public function _html($message) {
        $html = '
<div bgcolor="#e1e8ed" style="margin:0;padding:0">
	<table cellpadding="0" cellspacing="0" border="0" width="100%" bgcolor="#e1e8ed" style="background-color:#e1e8ed;padding:0;margin:0;line-height:1px;font-size:1px">
		<tbody>
			<tr>
				<td align="center" style="padding:0;margin:0;line-height:1px;font-size:1px">
				<table align="center" width="500" style="width:500px;padding:0;margin:0;line-height:1px;font-size:1px" bgcolor="#ffffff" cellpadding="0" cellspacing="0" border="0">
					<tbody>
						<tr>
							<td style="min-width:500px;height:1px;padding:0;margin:0;line-height:1px;font-size:1px"><img src="" style="min-width:500px;min-height:1px;margin:0;padding:0;display:block;border:none;outline:none" class="CToWUd"></td>
						</tr>
					</tbody>
				</table></td>
			</tr>
			<tr>
				<td align="center" style="padding:0;margin:0;line-height:1px;font-size:1px">
				<table align="center" width="500" style="width:500px;background-color:#ffffff;padding:0;margin:0;line-height:1px;font-size:1px" bgcolor="#ffffff" cellpadding="0" cellspacing="0" border="0">
					<tbody>
						<tr>
							<td height="15" style="height:15px;padding:0;margin:0;line-height:1px;font-size:1px"> &nbsp; </td>
						</tr>
						<tr>
							<td style="padding:0;margin:0;line-height:1px;font-size:1px">
							<table cellpadding="0" cellspacing="0" border="0" width="100%" style="width:100%;padding:0;margin:0;line-height:1px;font-size:1px">
								<tbody>
									<tr>
										<td align="left" width="15" style="width:15px;padding:0;margin:0;line-height:1px;font-size:1px"></td>
										<td align="left" width="28" style="padding:0;margin:0;line-height:1px;font-size:1px"><a href="" style="text-decoration:none;border-style:none;border:0;padding:0;margin:0" target="_blank"><img align="left" width="28" src="' . $this->config->base_url() . 'assets/images/butler.png" style="width:15px;padding-bottom:2px;margin:0;padding:0;display:block;border:none;outline:none" class="CToWUd"></a></td>
										<td align="left" width="10" style="width:10px;padding:0;margin:0;line-height:1px;font-size:1px"></td>
										<td align="left" style="padding:0;margin:0;line-height:1px;font-size:1px;font-family:\'Helvetica Neue Light\',Helvetica,Arial,sans-serif;color:#66757f;font-size:16px;padding:0px;margin:0px;font-weight:300;line-height:100%;text-align:left"><span dir="ltr">Majoradom,</span></td>
									</tr>
								</tbody>
							</table></td>
						</tr>
						<tr>
							<td height="14" style="height:14px;padding:0;margin:0;line-height:1px;font-size:1px"> &nbsp; </td>
						</tr>
					</tbody>
				</table>
				<table align="center" width="500" style="width:500px;background-color:#ffffff;padding:0;margin:0;line-height:1px;font-size:1px" cellpadding="0" cellspacing="0" border="0">
					<tbody>
						<tr>
							<td colspan="2" height="1" style="line-height:1px;display:block;height:1px;background-color:#e1e8ed;padding:0;margin:0;line-height:1px;font-size:1px"></td>
						</tr>
					</tbody>
				</table>
				<table align="center" width="500" style="width:500px;background-color:#ffffff;padding:0;margin:0;line-height:1px;font-size:1px" cellpadding="0" cellspacing="0" border="0">
					<tbody>
						<tr>
							<td width="50" style="width:25px;padding:0;margin:0;line-height:1px;font-size:1px"></td>
							<td align="center" style="padding:0;margin:0;line-height:1px;font-size:1px">
                                                            <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0" style="padding:0;margin:0;line-height:1px;font-size:1px">
                                                                    <tbody>
                                                                            <tr>
                                                                                    <td height="30" style="height:30px;padding:0;margin:0;line-height:1px;font-size:1px"></td>
                                                                            </tr>
                                                                            <tr>
                                                                                    <td height="12" style="height:12px;padding:0;margin:0;line-height:1px;font-size:1px"></td>
                                                                            </tr>
                                                                            <tr>
                                                                                    <td align="left" style="padding:0;margin:0;line-height:1px;font-size:1px;font-family:\'Helvetica Neue Light\',Helvetica,Arial,sans-serif;color:#66757f;font-size:16px;padding:0px;margin:0px;font-weight:300;line-height:23px;text-align:left">
                                                                                     ' . $message . '
                                                                                     </td>
                                                                            </tr>
                                                                            <tr>
                                                                                    <td height="44" style="height:44px;padding:0;margin:0;line-height:1px;font-size:1px"></td>
                                                                            </tr>
                                                                    </tbody>
                                                            </table>
                                                        </td>
                                                        <td width="50" style="width:25px;padding:0;margin:0;line-height:1px;font-size:1px"></td>
							
						</tr>
					</tbody>
				</table>
				<table align="center" width="500" style="width:500px;background-color:#ffffff;padding:0;margin:0;line-height:1px;font-size:1px" cellpadding="0" cellspacing="0" border="0">
					<tbody>
						<tr>
							<td height="1" style="line-height:1px;display:block;height:1px;background-color:#e1e8ed;padding:0;margin:0;line-height:1px;font-size:1px"></td>
						</tr>
						<tr>
							<td height="10" style="height:10px;line-height:1px;font-size:1px;padding:0;margin:0;line-height:1px;font-size:1px"></td>
						</tr>
						<tr>
							<td align="center" style="padding:0;margin:0;line-height:1px;font-size:1px">
								<span> 
									<a href="'.base_url().'" style="text-decoration:none;border-style:none;border:0;padding:0;margin:0;font-family:\'Helvetica Neue Light\',Helvetica,Arial,sans-serif;color:#8899a6;font-size:12px;padding:0px;margin:0px;font-weight:normal;line-height:12px">www.majoradom.com</a> 
									</span></td>
						</tr>
					</tbody>
				</table></td>
			</tr>
		</tbody>
	</table>
</div>';

        return $html;
    }

}

?>