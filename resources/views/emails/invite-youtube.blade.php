@component('mail::message')
<style>
   a{
      color: #0645AD;
      text-decoration: none;
   }
   div{
      border-top: 1px solid black;
   }
</style>
<body>
<p>Hey {{ $inviter }}</p>
<p>
   {{ $content }}
</p>
<p><a href="http://146.185.134.55/residents/NaamFamilielid/stories">Bekijk jouw verhalen</a></p>

@if ($token != 'NoToken')
    <p><a href="{{ route('password.set',['token'=>$token]) }}" target="_blank">Bevestig je e-mail adres via deze
        link</a> en kies daarna een wachtwoord.</p>
@endif

<p></p>

<div>
   <h1></h1>
   <h2>Video’s opzoeken op het internet?</h2>
   <p>Niets beter dan een video om herinneringen naar boven te brengen. Zoek op het internet naar video’s die jullie familieverhalen illustreren.
      <br>
      <a href="https://prisma.care/inspiratie-fotos-en-videos-zoeken-op-het-internet/">Tips om beelden te vinden? Klik hier!</a>
   </p>
   <h3>Hoe upload ik een YouTube video</h3>
   <p>Ga naar YouTube en zoek je favoriete video. Kopieer de link en plak hem in het bijhorende tekstvak.</p>
</div>
@endcomponent
