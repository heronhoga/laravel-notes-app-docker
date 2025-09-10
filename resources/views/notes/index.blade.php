@include('sweetalert2::index')
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Your Notes</title>
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body class="bg-gray-100 min-h-screen flex flex-col items-center py-10">
        <div class="bg-white shadow-lg rounded-2xl w-full max-w-3xl p-6">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-2xl font-bold text-gray-800">📒 Your Notes</h1>

                <div class="flex gap-3">
                    <!-- Create Note Button -->
                    <a
                        href="{{ route('notes.create') }}"
                        class="px-4 py-2 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700"
                    >
                        + Create Note
                    </a>

                    <!-- Logout Button -->
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button
                            type="submit"
                            class="px-4 py-2 bg-red-600 text-white rounded-lg shadow hover:bg-red-700"
                        >
                            Logout
                        </button>
                    </form>
                </div>
            </div>

            <!-- Notes Table -->
            <table class="w-full border-collapse">
                <thead>
                    <tr class="bg-gray-200 text-gray-700 text-left">
                        <th class="px-4 py-2 border">ID</th>
                        <th class="px-4 py-2 border">Title</th>
                        <th class="px-4 py-2 border">Description</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($notes as $note)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-2 border">{{ $note->id }}</td>
                        <td class="px-4 py-2 border font-semibold">
                            {{ $note->title }}
                        </td>
                        <td class="px-4 py-2 border">{{ $note->content }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3" class="text-center text-gray-500 py-4">
                            No notes yet. Start by creating one!
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </body>
</html>
