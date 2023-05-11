@extends('templates.admin-base')

@section('content')


    <div class="w-3/4 m-auto mt-5 mb-5">
        <a href="{{route('estados.create')}}" class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Añadir estado</a>
    </div>

    
      
      <div id="popup-modal" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
          <div class="relative w-full max-w-md max-h-full">
              <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                  <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="popup-modal">
                      <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                      <span class="sr-only">Close modal</span>
                  </button>
                  <div class="p-6 text-center">
                      <svg aria-hidden="true" class="mx-auto mb-4 text-gray-400 w-14 h-14 dark:text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                      <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to delete this product?</h3>
                    <div class="flex justify-center">
                        <form id="form-delete" method="POST" action="">
                            @csrf
                            @method("DELETE")
                            <button data-modal-hide="popup-modal"  type="submit" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                    Yes, I'm sure
                            </button>
                        </form>
                          
                          <button data-modal-hide="popup-modal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No, cancel</button>
                    </div>
                      
                  </div>
              </div>
          </div>
      </div>
      

<div class="w-1/2 m-auto mt-10">
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Nombre
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Imagen
                    </th>

                    <th scope="col" class="px-6 py-3">
                        Acciones
                    </th>

                </tr>
            </thead>
            <tbody>
                @foreach ($data as $estado)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                        {{$estado->nombre}}
                    </td>
                    
                    <td class="w-32 h-32">
                        <img class="w-full h-full object-contain" src="{{asset('storage/'.$estado->image->ruta)}}"  alt="Apple Watch">
                    </td>
                    
                    <td class="px-6 py-4">
                        <button data-modal-target="popup-modal" onclick="changeActionDelete({{$estado->id}})" data-modal-toggle="popup-modal" class="font-medium text-red-600 dark:text-red-500 hover:underline" type="button">
                            Eliminar
                          </button>
                        <a href="{{route('estados.edit',$estado->id)}}"">Editar</a>
                    </td>
                </tr>
                @endforeach
                
                
            </tbody>
        </table>
    </div>
</div>

<script>
    function changeActionDelete(id){
        const form = document.getElementById("form-delete");

        form.action = `{{ route("estados.destroy", "") }}/${id}`
    }

</script>

@endsection