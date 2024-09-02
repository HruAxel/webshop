@extends('layouts.main')

@section('title', 'Mi a matcha?')

@section('content')

<div class="col-12 d-flex justify-content-center align-items-center" style="height: 400px">
    <img class="col-12 position-absolute top-0 z-0 img_1 object-fit-cover" style="height: 400px" src="{{asset('assets/pictures/about.jpeg')}}" alt="">
    <h2 class="z-2 text-white">Mi a matcha?</h2>
</div>
<div class="col-12 d-flex flex-row about-height " style="padding-left: 200px; padding-right: 200px">
    <div class="col-9 p-5">
        <p>Szószerinti fordításban a matcha annyit tesz mint, “poralapú tea”. Magas minőségű változatait Japánban termesztik a mai napig, ahol már 1000 éve is megjelent, a tea ceremónáik alapvető részeként. Napjainkban a japán gasztrokultúra nélkülözhetetlen része, méghozzá, mint meleg-és hideg italok összetevője, ezen kívül pedig még süteményekben is megjelenik.

            A 21. század kezdete óta aztán kezdett világszerte egyre nagyobb népszerűségre szert tenni a tudatosan táplálkozók, illetve az erre törekvők körében, mivel az egyik legegészségesebb táplálékkiegészítőnek ismerték el.
            
            Nem véletlenül, hiszen a matcha a természetes termékek közül az ismert legmagasabb sejtvédő értékekkel rendelkezik, jócskán maga mögé utasítva ebben olyan “superfoodokat”, mint a goji bogyó, a gránátalma vagy a hagyományos zöld tea. A közhiedelem szerint ugyanis ezek az antioxidánsok – katechinek – rákmegelőző tulajdonságokkal bírnak. A matchában található katechinek növelik a hőképződést, ami által a test kalóriaégető képességét 20%-kal növeli meg a napi energialevezetéshez képest.A matchában található koffein pedig egy finom energia löketet biztosít, amit az L-theanine egyensúlyoz ki, ami egy, a nyugtató zöldteákban megtalálható aminosav. Ezeknek az elemeknek a kombinációja segíti elő egyfajta éber és élénk állapot elérését; mindezt a koffein veszélyei nélkül, ami miatt a kávét manapság már kevéssé tartjuk egészségesnek.<br>
            
            <b>Mi a különbség a matcha és a hagyományos teák között?</b>
            
            Amikor matchát iszunk, a teljes tealevelet elfogyasztjuk, ezzel ellátva testünket a tea összes tápanyagával (aminosavak, ásványi anyagok, vitaminok, rostok és antioxidánsok). A hagyományos teázás esetében ezeknek az összetevőknek csak a 10-20%-ához jut hozzá a szervezet (a tea típusától függően). Ez az alapvető különbség a matcha és az összes többi tea között.
            
            A Moya Matcha egy autentikus japán, organikus matcha márka, amelyet Kiotó megye Uji régiójában termesztenek. Ez a régió pedig nem kevesebb, mint 800 éves hírnevet köszönhet a legmagasabb minőségű zöld tea termesztésének. A régió termékeny talajáról és tiszta vízéről híres. A zöld tea növények tehát ideális növekedési feltételekkel rendelkeznek a sok napfényt biztosító dombok és a gyakori köd miatt, ami segít megvédeni a finom leveleket a fagytól és a nagy mennyiségű csapadéktól. A Moya Matchát rendkívüli odafigyeléssel termesztik és szüretelik a kicsi, családi tulajdonban lévő teaföldeken. Ezt követően helyben kerülnek feldolgozásra, hogy minden évjárat a frissesség minőségét tudja garantálni. A tealeveleket speciális tárolókban, 0 fok alatti hőmérsékleten tartják, mielőtt teaporrá őrlik őket. Majd légmentesen csomagolva, egyenesen Japánból érkeznek az Ön otthonába. Ez az eljárási folyamat segít megőrizni a tealevelek összes tulajdonságát, és megőrizni azok magas ásványi anyag és antioxidáns tartalmát.</p>
    </div>
    <div class="col-5 d-flex" style="height: 600px;">
        <img src="{{asset('assets/pictures/info.jpeg')}}" class="w-100 p-5 object-fit-cover" alt="">
    </div>
</div>


@endsection