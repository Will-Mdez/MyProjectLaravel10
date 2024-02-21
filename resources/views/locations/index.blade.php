<x-app-layout>
    <style type="text/css">
        #map {
          display: none;
          height: 400px;
          width: 400px;
          background: white;
        }
    </style>
    <x-slot name="header" class="mt-10">
        <h2 class="dark:text-white ">Laravel - Google Maps</h2>
    </x-slot>

    <div id="map"></div>

    <table class="table mt-3 dark:text-gray-400 dark:bg-white" >
        <thead>
            <tr>
                <th class="px-4 py-1 dark:text-black">Rpu</th>
                <th class="px-4 py-1 dark:text-black">CveTarea</th>
                <th class="px-4 py-1 dark:text-black">Latitud</th>
                <th class="px-4 py-1 dark:text-black">Longitud</th>
                </tr>
        </thead>
        <tbody>
            @foreach ($locations as $location)
                <tr class="location-row" data-lat="{{ $location->Latitud }}" data-lng="{{ $location->Longitud }}" data-rpu="{{ $location->Rpu }}">
                    <td class="px-4 py-1 dark:text-black hover:bg-gray-300 hover:roun">{{ $location->Rpu }}</td>
                    <td >{{ $location->CveTarea }}</td>
                    <td >{{ $location->Latitud }}</td>
                    <td >{{ $location->Longitud }}</td>
                    </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script type="text/javascript">
  $(document).ready(function () {
      $('.location-row').click(function () {
          const lat = $(this).data('lat');
          const lng = $(this).data('lng');
          const rpu = $(this).data('rpu');
          const latLng = { lat, lng };

          if ($('#map').is(':visible')) {
              // Si el mapa está visible, ocúltalo
              $('#map').hide();
          } else {
              // Si el mapa no está visible, muéstralo
              updateMap(latLng, rpu);
          }

          $(this).toggleClass('highlight'); // Toggle para agregar/eliminar la clase 'highlight'
      });

      $('.location-row').mouseout(function () {
          $(this).removeClass('highlight'); // Elimina clase 'highlight' al salir de la fila
      });

      function updateMap(latLng, rpu) {
          $('#map').show();

          const map = new google.maps.Map(document.getElementById("map"), {
              zoom: 16,
              center: latLng,
          });

          new google.maps.Marker({
              position: latLng,
              map,
              title: "RPU: " + rpu,
          });
      }
  });
</script>
</script>
<script type="text/javascript"
                src="https://maps.google.com/maps/api/js?key={{ env('GOOGLE_MAP_KEY') }}&callback=updateMap" ></script>
</x-app-layout>
