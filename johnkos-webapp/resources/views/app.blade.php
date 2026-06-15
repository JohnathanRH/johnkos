<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'JohnKos')</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=poppins:400,500,600,700|montserrat:400,500,600,700" rel="stylesheet" />

    {{-- Flatpickr CSS --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

    <script>
        (function() {
            const theme = localStorage.getItem('color-theme') || (window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light');
            if (theme === 'dark') {
                document.documentElement.classList.add('dark');
            } else {
                document.documentElement.classList.remove('dark');
            }
        })();
    </script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- Custom Styles for Flatpickr Theme --}}
    <style>
        /* --- General Adjustments --- */
        .flatpickr-calendar .flatpickr-day.prevMonthDay,
        .flatpickr-calendar .flatpickr-day.nextMonthDay {
            opacity: 0.35; /* Dim out-of-month dates */
        }

        /* --- Light Mode Customization --- */
        .flatpickr-calendar:not(.dark) {
            background-color: #e0eaf5; /* surface */
            border-radius: 8px;
            border: 1px solid rgba(255, 255, 255, 0.5); /* card-border */
            box-shadow: 8px 8px 16px rgba(163, 177, 198, 0.6); /* clay shadow */
        }
        .flatpickr-calendar:not(.dark) .flatpickr-day.selected {
            background: #6a9ce4; /* primary */
            border-color: #6a9ce4;
        }
        .flatpickr-calendar:not(.dark) .flatpickr-day.today {
            border-color: #6a9ce4;
        }
        .flatpickr-calendar:not(.dark) .flatpickr-day:hover {
            background: #c5d5e8; /* A more distinct hover color */
        }
        .flatpickr-calendar:not(.dark) .flatpickr-months .flatpickr-month,
        .flatpickr-calendar:not(.dark) .flatpickr-weekday,
        .flatpickr-calendar:not(.dark) .flatpickr-day {
            color: #1C398E; /* main */
        }
        .flatpickr-calendar:not(.dark) .flatpickr-months .flatpickr-prev-month:hover svg,
        .flatpickr-calendar:not(.dark) .flatpickr-months .flatpickr-next-month:hover svg {
            fill: #6a9ce4; /* primary */
        }

        /* --- Dark Mode Customization --- */
        .flatpickr-calendar.dark {
            background-color: #334155; /* dark-surface */
            border: 1px solid rgba(255, 255, 255, 0.05); /* dark-card-border */
            box-shadow: 8px 8px 16px rgba(0, 0, 0, 0.5); /* dark-clay shadow */
        }
        .flatpickr-calendar.dark .flatpickr-day.selected {
            background: #3b82f6; /* dark-primary */
            border-color: #3b82f6;
        }
        .flatpickr-calendar.dark .flatpickr-day:hover {
             background: #475569; /* dark-surface-hover */
        }
        .flatpickr-calendar.dark .flatpickr-day.today {
            border-color: #3b82f6; /* dark-primary */
        }
        .flatpickr-calendar.dark .flatpickr-months .flatpickr-month,
        .flatpickr-calendar.dark .flatpickr-weekday,
        .flatpickr-calendar.dark .flatpickr-day,
        .flatpickr-calendar.dark .flatpickr-current-month .numInputWrapper span {
            color: #f1f5f9; /* dark-main */
        }
        .flatpickr-calendar.dark .flatpickr-months .flatpickr-prev-month svg,
        .flatpickr-calendar.dark .flatpickr-months .flatpickr-next-month svg {
            fill: #f1f5f9; /* dark-main */
        }
    </style>

    @stack('styles')
</head>
<body class="antialiased bg-background dark:bg-dark-background text-main dark:text-dark-main font-sans leading-normal transition-colors duration-300">
    <div class="flex min-h-screen animate-fade-in">
        @include('layouts.owner.sidebar')

        <main class="flex-1 flex flex-col p-6 gap-6 overflow-y-auto">
            @include('layouts.owner.header')

            <div class="content-wrapper">
                @yield('content')
            </div>
        </main>
    </div>

    {{-- Flatpickr JS --}}
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    {{-- Flatpickr Indonesian Localization --}}
    <script src="https://npmcdn.com/flatpickr/dist/l10n/id.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Initialize Flatpickr
            flatpickr(".datepicker", {
                altInput: true,
                altFormat: "j F Y",
                dateFormat: "Y-m-d",
                locale: "id", // Set locale to Indonesian
                onOpen: function(selectedDates, dateStr, instance) {
                    if (document.documentElement.classList.contains('dark')) {
                        instance.calendarContainer.classList.add('dark');
                    } else {
                        instance.calendarContainer.classList.remove('dark');
                    }
                },
            });
        });
    </script>

    @stack('scripts')
</body>
</html>
