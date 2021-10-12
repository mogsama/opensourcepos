<?php

namespace App\Models\Tokens;

use app\Models\Sale;

/**
 * Token_invoice_count class
 *
 * @property sale sale
 *
 */
class Token_invoice_count extends Token
{
	public function __construct(string $value = '')
	{
		parent::__construct($value);

		$this->sale = model('Sale');
	}

	public function token_id(): string
	{
		return 'CO';
	}

	public function get_value(): int
	{
		return empty($value) ? $this->sale->get_invoice_count() : $value;
	}
}
?>
