@props(['options', 'selected' => null, 'name'])

<select {{ $attributes->merge(['class' => 'form-control form-select text-white bg-gray-800 border border-gray-600 rounded-md focus:outline-none focus:border-blue-500 w-full']) }} name="{{ $name }}">
    @foreach($options as $key => $value)
        <option value="{{ $key }}" {{ $selected == $key ? 'selected' : '' }}>{{ $value }}</option>
    @endforeach
</select>