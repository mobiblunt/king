@extends('fronthead') 

@section('title', 'Anti-Money Laundering Policy')

@section('content')


<div class="row-90">
	<div class="tagline mb-150">
		<p class="fs-48 fw-200 tac">Anti-Money Laundering</p>
	</div>
</div>
<div class="bc-white py-40">
	<div class="row-90">
		<div class="content-1">
			<p class="tac wdt-80 ctr fs-18">Escrow Custodian Services Ltd is a Money Service Business, regulated by HM Revenue &amp; Customs (&#8220;HMRC&#8221;) under the Money Laundering Regulations 2007. Our registration number is 1276 9846.</p>
<p class="tac wdt-80 ctr fs-18"> </p>
<p class="tac wdt-80 ctr fs-18">In accordance with our regulatory obligations we follow a strict Know Your Client protocol in respect of all customers paying funds into our segregated client account or receiving funds therefrom.</p>
<p class="tac wdt-80 ctr fs-18"> </p>
<p class="tac wdt-80 ctr fs-18">This includes, for individuals, obtaining proof of identity and proof of address and ensuring that the remitter or recipient of funds is not a so-called Politically Exposed Person. For businesses we undertake the same protocol for the director(s) and the major shareholders of the company.</p>
<p class="tac wdt-80 ctr fs-18"> </p>
<p class="tac wdt-80 ctr fs-18">Should you wish to find out more about our anti-money laundering procedure please contact via our <a href="{{ route('contact.home') }}">contact form</a>.</p>
		</div>
	</div>
</div>

@stop