@extends('layouts/dashboardMain')

@section('container')
    <div class="p-4 rounded-lg mt-14">
        <form action="" method="POST">
            @csrf
            <label class="block mb-2 text-lg font-bold text-gray-900 dark:text-white uppercase" for="file_input">Upload
                file</label>
            <input
                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                aria-describedby="file_input_help" id="file_input" type="file">
            {{-- <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">SVG, PNG, JPG or GIF (MAX. 800x400px).
        </p> --}}
            <button type="submit"
                class="mt-3 bg-blue-500 rounded-lg text-white py-1 px-2 text-sm capitalize hover:bg-blue-700">upload</button>
        </form>


    </div>
@endsection
