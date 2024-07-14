@extends('layouts.main')

@section('title', 'Rólunk')

@section('content')

<div class="col-12 d-flex justify-content-center align-items-center" style="height: 400px">
    <img class="col-12 position-absolute top-0 z-0 img_1 object-fit-cover" style="height: 400px" src="{{asset('assets/pictures/about.jpeg')}}" alt="">
    <h2 class="z-2 text-white">Rólunk</h2>
</div>
<div class="col-12 d-flex flex-row about-height " style="padding-left: 200px; padding-right: 200px">
    <div class="col-9 p-5">
        <p>A Moya Matcha egy autentikus japán, organikus matcha márka, amelyet Kiotó megye Uji régiójában termesztenek. Ez a régió pedig nem kevesebb, mint 800 éves hírnevet köszönhet a legmagasabb minőségű zöld tea termesztésének. A régió termékeny talajáról és tiszta vízéről híres. A zöld tea növények tehát ideális növekedési feltételekkel rendelkeznek a sok napfényt biztosító dombok és a gyakori köd miatt, ami segít megvédeni a finom leveleket a fagytól és a nagy mennyiségű csapadéktól.<br><br>

            A Moya Matchát rendkívüli odafigyeléssel termesztik és szüretelik a kicsi, családi tulajdonban lévő teaföldeken. Ezt követően helyben kerülnek feldolgozásra, hogy minden évjárat a frissesség minőségét tudja garantálni. A tealeveleket speciális tárolókban, 0 fok alatti hőmérsékleten tartják, mielőtt teaporrá őrlik őket. Majd légmentesen csomagolva, egyenesen Japánból érkeznek az Ön otthonába. Ez az eljárási folyamat segít megőrizni a tealevelek összes tulajdonságát, és megőrizni azok magas ásványi anyag és antioxidáns tartalmát.<br><br>
            
            Minőségünket szigorú előírások, EU-ökológiai tanúsítás és a JONA által kiadott japán ökológiai tanúsítvány is  igazolja. Ez nem mást jelent, mint hogy a Moya Matchát növényvédő szerektől mentes területeken termesztik, minden tételt gondosan ellenőrizve, hogy kémia szereknek még csak a maradványai se legyenek megtalálhatóak a növényeken.<br><br>
            
            Négyféle Moya Matcha tea létezik: premium, traditional, daily és culinary. A matcha típusok nemcsak a tápanyagok megjelenése és tartalma, hanem mindenekelőtt az íz tekintetében különböznek egymástól.
            
            A Moya Matcha egy európai közösségi védjegy, amelyet az uniós jogszabályok védenek, és a Moya Europe tulajdona.</p>
    </div>
    <div class="col-3 d-flex" style="height: 600px;">
        <img src="{{asset('assets/pictures/about2.jpeg')}}" class="about p-5" alt="">
    </div>
</div>


@endsection