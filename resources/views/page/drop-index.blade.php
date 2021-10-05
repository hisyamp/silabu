<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DropBox File</title>
</head>
<body>
    <form action="{{url('drop')}}" method="post" enctype="multipart/form-data">
        @csrf
        <label for="">Files</label>
        <input type="file" name="file[]" id="" multiple="true">
        <button type="submit">Upload</button>
    </form>
    <table>
        <thead>
            <tr>
                <th>Title</th>
                <th>mimeType</th>
                <th>File Size</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($files as $file)
                <tr>
                    <td>
                        <a href="{{ url('drop/' . $file->file_title ) }}">{{ $file->file_title}}</a>
                    </td>
                    <td>{{ $file->file_type }}</td>
                    <td>{{($file->size) / 1024}} Kb</td>
                    <td>
                    <a href="{{ url('drop/' . $file->file_title . '/download' ) }}">Download</a>
                    <a href="{{ url('drop/' . $file->id . '/destroy' ) }}">Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>