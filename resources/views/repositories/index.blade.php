<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Repositories
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <table>
                    <thead>
                    <tr>
                        <th>
                            ID
                        </th>
                        <th>
                            Link
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse ($repositories as $repository)
                    <tr>
                        <td>
                            {{$repository->id}}
                        </td>
                        <td>
                            {{$repository->url}}
                        </td>
                        <td>
                            <a href="{{ route('repositories.show', $repository) }}">
                                See
                            </a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3">No repositories created</td>
                    </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
