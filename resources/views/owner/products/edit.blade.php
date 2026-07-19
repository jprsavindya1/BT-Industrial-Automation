@extends('layouts.owner')

@section('title', 'Edit Product | BT Industrial Automation')
@section('header_title', 'Edit Product')
@section('header_subtitle', 'Modify catalog details or specifications for ' . $product->name)

@section('content')
<div class="max-w-4xl bg-brand-blue-dark/20 border border-brand-blue-light/20 p-8 rounded-2xl">
    
    @if($errors->any())
        <div class="mb-6 bg-red-950/30 border border-red-800 text-red-200 px-4 py-3.5 rounded-xl text-sm">
            <ul class="list-disc pl-4 space-y-1">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('owner.products.update', $product->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @method('PUT')
        @include('owner.products.form-fields')

        <div class="pt-6 border-t border-brand-blue-light/10 flex justify-end gap-3">
            <a href="{{ route('owner.products.index') }}" 
               class="px-6 py-3 border border-brand-blue-light text-slate-300 hover:text-white rounded-xl text-sm font-bold transition-all duration-300">
                Cancel
            </a>
            <button type="submit" 
                    class="px-6 py-3 border border-transparent text-sm font-bold rounded-xl text-slate-950 bg-brand-gold hover:bg-brand-gold-dark focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-brand-gold transition-all duration-300 transform hover:-translate-y-0.5 shadow-lg shadow-brand-gold/10">
                Save Changes
            </button>
        </div>
    </form>

</div>
@endsection
