<?php
	/**
	 * @example
	 * $email = new Email('destinationemail@exemple.com', 'fromemail@exemple.com');
	 * $email->send('subject', 'message');
	 *
	 * @example
	 * $email = new Email('destinationemail@exemple.com', 'fromemail@exemple.com');
	 *
	 * $subject = 'Hello World';
	 * $message = '<h1>Hello World</h1>'
	 *            '<p>this is the body message</p>';
	 *
	 * $email->sendEmail($subject, $message);
	 *
	 */
class Email{

	private $destinationEmail;
	private $from;
	private $isSent = false;
	private $isHTML = true;
	private $showFrom = true;

	function __construct($destinationEmail, $from) {
		$this->destinationEmail = $destinationEmail;
		$this->from = $from;
	}

	public function getIsHTML() {
		return $this->isHTML;
	}

	public function setIsHTML($isHTML) {
		$this->isHTML = $isHTML;
	}

	public function getShowFrom() {
		return $this->showFrom;
	}

	public function setShowFrom($showFrom) {
		$this->showFrom = $showFrom;
	}

	public function getIsSent() {
		return $this->isSent;
	}

	private function buildHeader($add_headers) {
		$headers = "MIME-Version: 1.0\r\n";
		$headers .= ($this->isHTML == true) ? "Content-type: text/html; charset=UTF-8\r\n" : '';
		$headers .= ( $this->showFrom == true) ? "From: $this->from\r\n" : '';
		$headers .= $add_headers;
		return $headers;
	}

	public function send($subject, $message, $addHeaders = null) {
		//If the 'mail' function doesn't exists
		if (!function_exists("mail")) {
			return $this->isSent = false;
		} else {
			if (mail($this->destinationEmail, $subject, $message, $this->buildHeader($addHeaders)))
				$this->isSent = true;
			else
				$this->isSent = false;
		}
		return $this->isSent;
	}
}
?>
