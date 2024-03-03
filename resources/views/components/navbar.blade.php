<div>
    <nav class="mx-w-full">
        <div class="flex justify-between h-12">
            <div class="mt-3 ml-3">
                {{config('app.name', 'Laravel')}}
            </div>
            <div class="mt-3">
                <a href="{{ route('login')}}">Login</a>
                <label for="">|</label>
                <a href="{{ route('register') }}">Registrate</a>
            </div>
        </div>
    </nav>
</div>
