<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
<script>
new Morris.Line({
  element: 'chart_anime',
  <?php $n=1 ?>
  data: [
    @foreach($dataReportAnime as $item)
    { tanggal: '{{$item['tanggal']}}', @foreach ($labelReportAnime as $item2)'{{ $item2->judul_alternatif }}':{{$item[$item2->judul_alternatif]}},@endforeach },
    @endforeach
  ],
  xkey: 'tanggal',
  <?php $n=1 ?>
  ykeys: [@foreach ($labelReportAnime as $item)'{{$item->judul_alternatif}}',@endforeach],
  <?php $n=1 ?>
  labels: [@foreach ($labelReportAnime as $item)'Anime {{$n++}}',@endforeach],
  lineColors: ['#00a7d0','#008d4c','#db8b0b','#d33724','#005384']
});
new Morris.Line({
  element: 'chart_video',
  <?php $n=1 ?>
  data: [
    @foreach($dataReportVideo as $item)
    { tanggal: '{{$item['tanggal']}}', @foreach ($labelReportVideo as $item2)'{{ $item2->judul_alternatif }}':{{$item[$item2->judul_alternatif.$item2->id]}},@endforeach },
    @endforeach
  ],
  xkey: 'tanggal',
  <?php $n=1 ?>
  ykeys: [@foreach ($labelReportVideo as $item)'{{$item->judul_alternatif}}',@endforeach],
  <?php $n=1 ?>
  labels: [@foreach ($labelReportVideo as $item)'Video {{$n++}}',@endforeach],
  lineColors: ['#00a7d0','#008d4c','#db8b0b','#d33724','#005384']
});
new Morris.Line({
  element: 'chart_genre',
  <?php $n=1 ?>
  data: [
    @foreach($dataReportGenre as $item)
    { tanggal: '{{$item['tanggal']}}', @foreach ($labelReportGenre as $item2)'{{ $item2->nama_alternatif }}':{{$item[$item2->nama_alternatif.$item2->id]}},@endforeach },
    @endforeach
  ],
  xkey: 'tanggal',
  <?php $n=1 ?>
  ykeys: [@foreach ($labelReportGenre as $item)'{{$item->nama_alternatif}}',@endforeach],
  <?php $n=1 ?>
  labels: [@foreach ($labelReportGenre as $item)'Genre {{$n++}}',@endforeach],
  lineColors: ['#00a7d0','#008d4c','#db8b0b','#d33724','#005384']
});
</script>