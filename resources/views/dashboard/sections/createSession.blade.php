@extends('dashboard/main')
@section('content')
    <div id="app">
        <div class="bg-white rounded-lg p-4 shadow-lg shadow-gray-300/50">
            <div>
                <h2 class="text-gray-600 font-semibold">Create Session</h2>
            </div>
            {{--        form--}}
            <form method="POST" action="/dashboard/sessions">
                @csrf

                <div class="flex flex-col space-y-6 mt-10">
                    <div class="flex items-center">
                        <h1 class="w-3/12">Session Title</h1>
                        <input name="title"
                               class="text-gray-800 px-6 py-2 rounded-lg w-6/12 border-2 border-blue-200 focus:border-blue-500 outline-none"
                               type="text" placeholder="Session Title">
                    </div>
                    <div class="flex items-center">
                        <h1 class="w-3/12">Session Date</h1>
                        {{--                        <input name="date"--}}
                        {{--                               class="text-gray-800 px-6 py-2 rounded-lg w-6/12 border-2 border-blue-200 focus:border-blue-500 outline-none"--}}
                        {{--                               type="text" placeholder="Date">--}}

                        <input datepicker datepicker-orientation="bottom left" type="text"
                               class="text-gray-800 px-6 py-2 rounded-lg w-6/12 border-2 border-blue-200 focus:border-blue-500 outline-none"
                               placeholder="Select date">


                    </div>

                </div>

                <div class="flex justify-end space-x-4">
                    <a href="/dashboard/sessions"
                       class="text-blue-500 text-sm font-bold rounded-lg py-3 w-2/12 mt-6 outline-none bg-blue-100 text-center">
                        Cancel
                    </a>
                    <button type="submit"
                            class="bg-blue-500 border-2 border-blue-500 text-white text-sm font-bold rounded-lg py-3 w-2/12 mt-6 outline-none focus:bg-blue-100 focus:text-blue-500">
                        Submit
                    </button>
                </div>
            </form>
        </div>

    </div>
@endsection
@push('scripts')
    {{--    <script>--}}
    {{--            let vue = new Vue({--}}
    {{--                el: '#app',--}}
    {{--                data: {--}}
    {{--                    session: {--}}
    {{--                        title: '',--}}
    {{--                        date: '',--}}
    {{--                        file: '',--}}
    {{--                    }--}}
    {{--                },--}}
    {{--                methods: {--}}
    {{--                    postSessionData() {--}}
    {{--                        axios.post('/dashboard/sessions', {--}}
    {{--                            title: this.title,--}}
    {{--                            date: this.date,--}}
    {{--                            file: this.file,--}}
    {{--                        })--}}
    {{--                            .then(function (response) {--}}
    {{--                                console.log(response);--}}
    {{--                            })--}}
    {{--                            .catch(function (error) {--}}
    {{--                                console.log(error);--}}
    {{--                            });--}}
    {{--                        // console.log(this.session)--}}
    {{--                    }--}}
    {{--                }--}}
    {{--            })--}}
    {{--    </script>--}}
@endpush
