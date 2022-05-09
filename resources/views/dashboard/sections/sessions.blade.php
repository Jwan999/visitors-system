@extends('dashboard/main')
@section('content')
    <div id="app">
        <div class="bg-white rounded-lg p-4 shadow-lg shadow-gray-300/50">

            <div class="bg-white p-8 rounded-md w-full">
                <div class=" flex items-center justify-between pb-6">
                    <div>
                        <h2 class="text-gray-600 font-semibold">Sessions</h2>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex bg-gray-50 items-center p-2 rounded-md">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20"
                                 fill="currentColor">
                                <path fill-rule="evenodd"
                                      d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                      clip-rule="evenodd"/>
                            </svg>
                            <input class="bg-gray-50 outline-none ml-1 block " type="text" name="" id=""
                                   placeholder="search...">
                        </div>
                        <div class="lg:ml-40 ml-10 space-x-8">

                            <a href="/dashboard/sessions/create"
                               class="bg-blue-500 text-center border-2 border-blue-500 text-white text-sm font-bold rounded-lg py-3 px-3 mt-6 outline-none focus:bg-blue-100 focus:text-blue-500">
                                Create Session
                            </a>
                        </div>
                    </div>
                </div>

                <div>
                    <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                        <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                            <table class="min-w-full leading-normal">
                                <thead>
                                <tr>
                                    <th
                                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        Title
                                    </th>
                                    <th
                                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        Date
                                    </th>
                                    <th
                                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        Participants
                                    </th>
                                    <th
                                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        Actions
                                    </th>

                                </tr>
                                </thead>
                                <tbody>
                                <tr>

                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <p class="text-gray-900 whitespace-no-wrap">Admin</p>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <p class="text-gray-900 whitespace-no-wrap">
                                            Jan 21, 2020
                                        </p>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <p class="text-gray-900 whitespace-no-wrap">
                                            43
                                        </p>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <button @click="togglingImportModal()"
                                                class="bg-blue-500 border-2 px-2 border-blue-500 text-white text-sm rounded-lg py-1 outline-none focus:bg-blue-100 focus:text-blue-500">
                                            Import Participants
                                        </button>
                                    </td>

                                </tr>
                                <tr>

                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <p class="text-gray-900 whitespace-no-wrap">Admin</p>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <p class="text-gray-900 whitespace-no-wrap">
                                            Jan 21, 2020
                                        </p>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <p class="text-gray-900 whitespace-no-wrap">
                                            43
                                        </p>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <button
                                            class="bg-blue-500 border-2 px-2 border-blue-500 text-white text-sm rounded-lg py-1 outline-none focus:bg-blue-100 focus:text-blue-500">
                                            Import Participants
                                        </button>
                                    </td>

                                </tr>
                                <tr>

                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <p class="text-gray-900 whitespace-no-wrap">Admin</p>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <p class="text-gray-900 whitespace-no-wrap">
                                            Jan 21, 2020
                                        </p>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <p class="text-gray-900 whitespace-no-wrap">
                                            43
                                        </p>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <button
                                            class="bg-blue-500 border-2 px-2 border-blue-500 text-white text-sm rounded-lg py-1 outline-none focus:bg-blue-100 focus:text-blue-500">
                                            Import Participants
                                        </button>
                                    </td>

                                </tr>
                                </tbody>
                            </table>
                            <div
                                class="px-5 py-5 bg-white border-t flex flex-col xs:flex-row items-center xs:justify-between          ">
						<span class="text-xs xs:text-sm text-gray-900">
                            Showing 1 to 4 of 50 Entries
                        </span>
                                <div class="inline-flex mt-2 xs:mt-0">
                                    <button
                                        class="text-sm text-indigo-50 transition duration-150 hover:bg-indigo-500 bg-indigo-600 font-semibold py-2 px-4 rounded-l">
                                        Prev
                                    </button>
                                    &nbsp; &nbsp;
                                    <button
                                        class="text-sm text-indigo-50 transition duration-150 hover:bg-indigo-500 bg-indigo-600 font-semibold py-2 px-4 rounded-r">
                                        Next
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div v-if="importModal"
             class="bg-slate-800 bg-opacity-50 flex justify-center items-center absolute top-0 right-0 bottom-0 left-0">
            <div class="bg-white rounded-lg p-6 w-4/12 space-y-3">
                <h1 class="text-lg font-bold text-gray-700 mb-3"> Importing Participants</h1>
                <div class="flex flex-col items-center">
                    <input name="file"
                           class="text-gray-800 px-6 py-2 mt-3 w-full rounded-lg border-2 border-blue-200 focus:border-blue-500 outline-none"
                           type="file" placeholder="Date">
                    <div class="flex justify-end space-x-2 w-full">
                        <a @click="importModal = !importModal"
                           class="text-blue-500 text-sm font-bold rounded-lg py-3 w-4/12 mt-6 outline-none bg-blue-100 text-center cursor-pointer">
                            Cancel
                        </a>
                        <button type="submit"
                                class="bg-blue-500 border-2 border-blue-500 text-white text-sm font-bold rounded-lg py-3 w-4/12 mt-6 outline-none focus:bg-blue-100 focus:text-blue-500">
                            Submit
                        </button>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
@push('scripts')
    <script>
        vue = new Vue({
            el: '#app',
            data: {
                importModal: false,
            },
            methods: {
                togglingImportModal() {
                    this.importModal = !this.importModal
                }
            },
            mounted() {
                // this.testing();
            }
        })
    </script>
@endpush
