<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                 
                <table class="table">
                    <tr>
                        <th>type</th>
                        <th>ammount</th>

                    </tr>
                    @isset($account->transactions)
                    @foreach ($account->transactions as $transaction)
                    <tr>
                        <th>{{ $transaction->type }}</th>
                        <th>{{ $transaction->ammount }}</th>
                    </tr>
                @endforeach
                    @endisset
                   
                </table>
              
            </div>
        </div>
    </div>
</x-app-layout>
