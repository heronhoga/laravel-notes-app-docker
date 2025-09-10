@include('sweetalert2::index')
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Edit Note</title>
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body class="bg-gray-100 min-h-screen flex flex-col items-center py-10">
        <div class="bg-white shadow-lg rounded-2xl w-full max-w-2xl p-6">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-2xl font-bold text-gray-800">📝 Edit Note</h1>
                <a
                    href="{{ route('notes.index') }}"
                    class="px-4 py-2 bg-gray-600 text-white rounded-lg shadow hover:bg-gray-700"
                >
                    ⬅ Back
                </a>
            </div>

            <!-- Edit Note Form -->
            <form
                action="{{ route('notes.edit', $note->id) }}"
                method="POST"
                class="space-y-5"
            >
                @csrf @method('PUT')

                <!-- Title -->
                <div>
                    <label
                        for="title"
                        class="block text-sm font-medium text-gray-700 mb-1"
                    >
                        Title
                    </label>
                    <input
                        type="text"
                        name="title"
                        id="title"
                        value="{{ old('title', $note->title) }}"
                        required
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="Enter note title"
                    />
                </div>

                <!-- Description -->
                <div>
                    <label
                        for="description"
                        class="block text-sm font-medium text-gray-700 mb-1"
                    >
                        Description
                    </label>
                    <textarea
                        name="description"
                        id="description"
                        rows="5"
                        required
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="Write your note here..."
                        >{{ old('description', $note->description) }}</textarea
                    >
                </div>

                <!-- Submit -->
                <div class="flex justify-end">
                    <button
                        type="submit"
                        class="px-6 py-2 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700"
                    >
                        Update Note
                    </button>
                </div>
            </form>
        </div>
    </body>
</html>
