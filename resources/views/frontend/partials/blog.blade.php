@extends('frontend.layouts.app')
@section('content')
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Arial', sans-serif;
        }

        .comingh1 {
            font-size: 3.5rem;
            margin-bottom: 2rem;
            font-weight: bold;
        }

        .mainContainer {
            width: 100%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 2rem;
            margin: 200px auto 10px auto;
            width: 80%;
        }

        .leftContent {
            width: 50%;
            padding-right: 2rem;
        }

        .rightContent {
            width: 50%;
        }

        .filmReel {
            width: 100%;
            max-width: 450px;
            background-color: transparent;
            mix-blend-mode: screen;
            filter: drop-shadow(0 0 200px rgba(255, 255, 255, 0.2));
        }

        .countdownContainer {
            display: flex;
            margin: 2rem 0;
            gap: 1rem;
        }

        .timeBox {
            text-align: center;
        }

        .timeValue {
            font-size: 3rem;
            font-weight: bold;
            background-color: #111;
            padding: 1rem;
            margin-bottom: 0.5rem;
            min-width: 90px;
            border-radius: 5px;
        }

        .timeLabel {
            font-size: 0.85rem;
            color: #aaa;
        }

        .secondsBox {
            background-color: #fd6716;
        }

        .timeSeparator {
            font-size: 3rem;
            display: flex;
            align-items: center;
            color: #fd6716;
        }

        .subscribeForm {
            display: flex;
            margin: 2rem 0;
        }

        .emailInput {
            padding: 1rem;
            width: 100%;
            background-color: #111;
            border: none;
            color: #fff;
        }

        .subscribeBtn {
            padding: 1rem 2rem;
            background-color: #fd6716;
            color: #fff;
            border: none;
            cursor: pointer;
        }

        .workingMessage {
            color: #aaa;
            margin-bottom: 2rem;
        }

        .socialLinks {
            display: flex;
            gap: 1rem;
            margin-top: 1rem;
        }

        .socialIcon {
            width: 40px;
            height: 40px;
            background-color: #333;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
        }

        .followText {
            margin-bottom: 1rem;
            color: #aaa;
        }

        .settingsIcon {
            position: absolute;
            top: 1rem;
            right: 1rem;
            font-size: 1.5rem;
        }

        @media (max-width: 768px) {
            .mainContainer {
                flex-direction: column;
                width: auto;
            }

            .leftContent,
            .rightContent {
                width: 100%;
                padding: 1rem;
            }

            .rightContent {
                display: none;
            }

            .comingh1 {
                font-size: 2.5rem;
            }

            .countdownContainer {
                justify-content: center;
            }

            .timeValue {
                font-size: 18px;
                font-weight: bold;
                background-color: #111;
                padding: 10px;
                margin-bottom: 0.5rem;
                min-width: auto;
                border-radius: 5px;
            }
        }
    </style>
    <section class="banner w-100">
        <h1>Blog et Actualités</h1>
    </section>
    <div class="mainContainer">
        <div class="leftContent">
            <h1 class="comingh1">Nous Revenons Bientôt</h1>

            <div class="countdownContainer">
                <div class="timeBox">
                    <div class="timeValue">10</div>
                    <div class="timeLabel">Jours</div>
                </div>

                <div class="timeSeparator">:</div>

                <div class="timeBox">
                    <div class="timeValue">11</div>
                    <div class="timeLabel">Heures</div>
                </div>

                <div class="timeSeparator">:</div>

                <div class="timeBox">
                    <div class="timeValue">46</div>
                    <div class="timeLabel">Minutes</div>
                </div>

                <div class="timeSeparator">:</div>

                <div class="timeBox">
                    <div class="timeValue secondsBox">01</div>
                    <div class="timeLabel">Secondes</div>
                </div>
            </div>

            <form class="subscribeForm">
                <input type="email" placeholder="E-mail*" class="emailInput" required>
                <button type="submit" class="subscribeBtn">S'abonner</button>
            </form>

            <p class="workingMessage">Nous travaillons très dur sur la nouvelle version</p>
        </div>

        <div class="rightContent">
            <img src="{{ asset('assets/img/bandefilm.avif') }}" class="filmReel">
        </div>
    </div>
    <!-- Add countdown script -->
    <script>
        // Simple countdown timer
        let countdown = setInterval(function() {
            // Get the seconds element
            const secondsEl = document.querySelector('.secondsBox');
            let seconds = parseInt(secondsEl.textContent);

            if (seconds > 0) {
                seconds--;
                secondsEl.textContent = seconds.toString().padStart(2, '0');
            } else {
                // Reset to 59 when it reaches 0
                secondsEl.textContent = '59';

                // Update minutes
                const minutesEl = document.querySelector('.timeBox:nth-child(5) .timeValue');
                let minutes = parseInt(minutesEl.textContent);

                if (minutes > 0) {
                    minutes--;
                    minutesEl.textContent = minutes.toString().padStart(2, '0');
                } else {
                    // Reset minutes and update hours
                    minutesEl.textContent = '59';

                    const hoursEl = document.querySelector('.timeBox:nth-child(3) .timeValue');
                    let hours = parseInt(hoursEl.textContent);

                    if (hours > 0) {
                        hours--;
                        hoursEl.textContent = hours.toString().padStart(2, '0');
                    } else {
                        // Reset hours and update days
                        hoursEl.textContent = '23';

                        const daysEl = document.querySelector('.timeBox:first-child .timeValue');
                        let days = parseInt(daysEl.textContent);

                        if (days > 0) {
                            days--;
                            daysEl.textContent = days.toString().padStart(2, '0');
                        } else {
                            // Countdown complete
                            clearInterval(countdown);
                        }
                    }
                }
            }
        }, 1000);
    </script>
@endsection
