<!-- resources/views/user_list.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Send Message </title>
   
</head>
<body>
    <div>
        @if (Session::has('success'))
            <div>{{ Session::get('success') }}</div>
        @endif

        <form action="{{ route('message.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <label for="message">Message:</label>
            <textarea name="message" id="message" cols="30" rows="5">{{ old('message') }}</textarea>

            <label for="image">Image:</label>
            <input type="file" name="image" id="image">

            <button type="submit">Send</button>
        </form>

        <h2>Messages:</h2>
        @foreach ($messages as $message)
            <div>
                <p>{{ $message->message }}</p>
                @if ($message->image_path)
                    <img src="{{ asset($message->image_path) }}" alt="Message Image" style="max-width: 300px;">
                @endif
            </div>
        @endforeach
    </div>
</body>
</html>
