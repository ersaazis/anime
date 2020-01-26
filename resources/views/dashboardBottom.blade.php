<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
<script>
new Morris.Line({
  element: 'chart_anime',
  data: [
    @foreach($dataReportAnime as $item)
    { tanggal: '{{$item['tanggal']}}', @foreach ($labelReportAnime as $item2)'{{ $item2->judul_alternatif }}':{{$item[$item2->judul_alternatif]}},@endforeach },
    @endforeach
  ],
  xkey: 'tanggal',
  ykeys: [@foreach ($labelReportAnime as $item)'{{$item->judul_alternatif}}',@endforeach],
  labels: [@foreach ($labelReportAnime as $item)'Anime {{$n++}}',@endforeach],
  lineColors: ['#00a7d0','#008d4c','#db8b0b','#d33724','#005384']
});
new Morris.Line({
  element: 'chart_video',
  data: [
    @foreach($dataReportVideo as $item)
    { tanggal: '{{$item['tanggal']}}', @foreach ($labelReportVideo as $item2)'{{ $item2->judul_alternatif }}':{{$item[$item2->judul_alternatif.$item2->id]}},@endforeach },
    @endforeach
  ],
  xkey: 'tanggal',
  ykeys: [@foreach ($labelReportVideo as $item)'{{$item->judul_alternatif}}',@endforeach],
  labels: [@foreach ($labelReportVideo as $item)'Video {{$n++}}',@endforeach],
  lineColors: ['#00a7d0','#008d4c','#db8b0b','#d33724','#005384']
});
new Morris.Line({
  element: 'chart_genre',
  data: [
    @foreach($dataReportGenre as $item)
    { tanggal: '{{$item['tanggal']}}', @foreach ($labelReportGenre as $item2)'{{ $item2->nama_alternatif }}':{{$item[$item2->nama_alternatif.$item2->id]}},@endforeach },
    @endforeach
  ],
  xkey: 'tanggal',
  ykeys: [@foreach ($labelReportGenre as $item)'{{$item->nama_alternatif}}',@endforeach],
  labels: [@foreach ($labelReportGenre as $item)'Video {{$n++}}',@endforeach],
  lineColors: ['#00a7d0','#008d4c','#db8b0b','#d33724','#005384']
});
</script>