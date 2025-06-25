@extends('app')

@section('head')
  <link rel="stylesheet" href="../css/game.css" />
  <link rel="stylesheet" href="../css/myData.css" />
@endsection

@section('content')
  {{-- 画像を取り出し関数 --}}
  @php
    if (!function_exists('cardImageOut')) {
        function cardImageOut($cardName, $cardForward, $width = 100) {
          $src = '../img/card/'.$cardName.'.png';
          $forward = '';
          if (!$cardForward) {
            $forward = 'style="transform: scaleY(-1);"';
          }
          return '<img src="' . $src . '" alt="" width="' . $width . '" '.$forward.'>';
        }
    }
  @endphp

  <div class="container">
    <header class="navbar">
      <nav>
        <ul class="nav-links">
          <li><button class="navbutton" onclick="history.back()">Back to game</button></li>
        </ul>
        <div class="sign-in">
          <a href="{{ route('login') }}"><button class="navbutton">Logout</button></a>
        </div>
      </nav>
    </header>

    <main class="main-content">
      @foreach (array_reverse($myDatas) as $key => $myData)
        <div class="data-box">
          <div class="data-title">{{ $key ?? '' }}</div>
          <div class="data-content-box">
            <div class="data-question">{{ $myData['question'] ?? '' }}</div>
            <table>
              <tr>
                <td>{!! cardImageOut($myData['cardName1'], $myData['cardForward1']) !!}</td>
                <td class="data-content">{{ $myData['content1'] ?? '' }}</td>
              </tr>
              <tr>
                <td>{!! cardImageOut($myData['cardName2'], $myData['cardForward2']) !!}</td>
                <td class="data-content">{{ $myData['content2'] ?? '' }}</td>
              </tr>
              <tr>
                <td>{!! cardImageOut($myData['cardName3'], $myData['cardForward3']) !!}</td>
                <td class="data-content">{{ $myData['content3'] ?? '' }}</td>
              </tr>
            </table>
          </div>
        </div>
      @endforeach
    </main>

    <footer class="footer" id="unity-footer">
      {{-- <span style="flex-grow: 1; text-align: left;"><div id="unity-logo-title-footer"></div></span>
      <div class="project-name" id="unity-build-title">Click to Zoom =></div>
      <div class="unity" id="unity-fullscreen-button"></div> --}}
    </footer>
  </div>
@endsection

@section('script')
@endsection
