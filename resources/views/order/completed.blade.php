<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Completed - FoodMate</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        @keyframes slideInDown {
            from {
                opacity: 0;
                transform: translateY(-30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes scaleIn {
            from {
                opacity: 0;
                transform: scale(0.5);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        @keyframes bounce {
            0%, 100% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.1);
            }
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-slide-in-down {
            animation: slideInDown 0.6s ease-out;
        }

        .animate-scale-in {
            animation: scaleIn 0.6s cubic-bezier(0.34, 1.56, 0.64, 1);
        }

        .animate-bounce-once {
            animation: bounce 0.6s ease-in-out;
        }

        .animate-fade-in-up {
            animation: fadeInUp 0.6s ease-out;
        }

        .header-illustration {
            background: linear-gradient(135deg, #FF6600 0%, #FFB347 100%);
            position: relative;
            overflow: hidden;
        }

        .header-illustration::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background-image: 
                radial-gradient(circle at 20% 50%, rgba(255, 255, 255, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 80% 80%, rgba(255, 255, 255, 0.1) 0%, transparent 50%);
            animation: moveBackground 15s ease-in-out infinite;
        }

        @keyframes moveBackground {
            0%, 100% {
                transform: translate(0, 0);
            }
            50% {
                transform: translate(20px, -20px);
            }
        }

        .checkmark-circle {
            width: 120px;
            height: 120px;
            background-color: #FF6600;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto;
            box-shadow: 0 8px 24px rgba(255, 102, 0, 0.3);
        }

        .checkmark-icon {
            font-size: 60px;
            color: white;
        }

        .star-rating {
            display: flex;
            justify-content: center;
            gap: 12px;
        }

        .star {
            cursor: pointer;
            font-size: 32px;
            transition: all 0.3s ease;
        }

        .star.inactive {
            color: #E5E7EB;
        }

        .star.active {
            color: #FF6600;
            transform: scale(1.2);
        }

        .star:hover {
            transform: scale(1.3);
        }

        .feedback-input {
            background-color: #F9FAFB;
            border: 1.5px solid #E5E7EB;
            padding: 12px 16px;
            border-radius: 12px;
            font-size: 14px;
            transition: all 0.3s ease;
            width: 100%;
            font-family: inherit;
        }

        .feedback-input:focus {
            outline: none;
            border-color: #FF6600;
            background-color: #FFFFFF;
            box-shadow: 0 0 0 3px rgba(255, 102, 0, 0.1);
        }

        .btn-primary {
            background-color: #FF6600;
            color: white;
            padding: 14px 32px;
            border-radius: 12px;
            border: none;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            font-size: 16px;
            width: 100%;
        }

        .btn-primary:hover:not(:disabled) {
            background-color: #E55A00;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(255, 102, 0, 0.3);
        }

        .btn-primary:active:not(:disabled) {
            transform: translateY(0);
        }

        .btn-primary:disabled {
            opacity: 0.5;
            cursor: not-allowed;
        }

        .btn-secondary {
            background-color: white;
            color: #FF6600;
            padding: 14px 32px;
            border-radius: 12px;
            border: 2px solid #FF6600;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            font-size: 16px;
            width: 100%;
        }

        .btn-secondary:hover {
            background-color: #FFF5F0;
            transform: translateY(-2px);
        }

        .btn-secondary:active {
            transform: translateY(0);
        }

        .text-muted {
            color: #9CA3AF;
        }

        .loading-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 50;
            justify-content: center;
            align-items: center;
        }

        .loading-overlay.show {
            display: flex;
        }

        .spinner {
            border: 4px solid rgba(255, 255, 255, 0.3);
            border-top: 4px solid #FF6600;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }
            100% {
                transform: rotate(360deg);
            }
        }

        .success-message {
            background-color: #ECFDF5;
            color: #065F46;
            padding: 12px 16px;
            border-radius: 8px;
            margin-bottom: 16px;
            display: none;
            animation: slideInDown 0.5s ease-out;
            border-left: 4px solid #10B981;
        }

        .success-message.show {
            display: block;
        }

        .button-container {
            display: flex;
            gap: 1rem;
        }

        .button-container button {
            flex: 1;
        }
    </style>
</head>
<body class="bg-white">
    <div x-data="orderFeedback()" class="min-h-screen flex flex-col">
        <!-- Header with Illustration -->
        <div class="header-illustration h-40 relative">
            <div class="relative z-10 h-full"></div>
        </div>

        <!-- Main Content -->
        <div class="flex-1 px-6 pb-8">
            <!-- Checkmark Section -->
            <div class="relative -mt-20 mb-8 animate-scale-in">
                <div class="checkmark-circle">
                    <i class="fas fa-check checkmark-icon animate-bounce-once"></i>
                </div>
            </div>

            <!-- Thank You Section -->
            <div class="text-center mb-8 animate-fade-in-up" style="animation-delay: 0.2s;">
                <h1 class="text-4xl font-bold text-gray-900 mb-2">Thank You!</h1>
                <p class="text-xl font-semibold text-gray-800 mb-1">Order Completed</p>
                <p class="text-sm text-muted">Please rate your last Driver</p>
            </div>

            <!-- Success Message -->
            <div id="successMessage" class="success-message">
                <div class="flex items-center gap-2">
                    <i class="fas fa-check-circle"></i>
                    <span>Feedback submitted successfully!</span>
                </div>
            </div>

            <!-- Rating Section -->
            <div class="mb-8 animate-fade-in-up" style="animation-delay: 0.4s;">
                <div class="star-rating">
                    <template x-for="i in 5" :key="i">
                        <i
                            class="fas fa-star star"
                            :class="i <= rating ? 'active' : 'inactive'"
                            @click="rating = i"
                            @mouseover="tempRating = i"
                            @mouseleave="tempRating = 0"
                            :style="`color: ${i <= tempRating ? '#FF6600' : (i <= rating ? '#FF6600' : '#E5E7EB')}`"
                        ></i>
                    </template>
                </div>
            </div>

            <!-- Feedback Input -->
            <div class="mb-8 animate-fade-in-up" style="animation-delay: 0.6s;">
                <div class="relative">
                    <i class="fas fa-pen absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                    <input
                        x-model="feedback"
                        type="text"
                        placeholder="Leave feedback"
                        class="feedback-input pl-12"
                        maxlength="500"
                    >
                </div>
            </div>

            <!-- Buttons Section -->
            <div class="button-container animate-fade-in-up" style="animation-delay: 0.8s;">
                <button
                    @click="submitFeedback()"
                    :disabled="!rating || isLoading"
                    class="btn-primary"
                >
                    <span x-show="!isLoading">Submit</span>
                    <span x-show="isLoading">
                        <i class="fas fa-spinner fa-spin mr-2"></i>Submitting...
                    </span>
                </button>
                <button
                    @click="skipFeedback()"
                    class="btn-secondary"
                >
                    Skip
                </button>
            </div>

            <!-- Info Text -->
            <p class="text-center text-xs text-muted mt-6">
                Your feedback helps us improve our service quality
            </p>
        </div>
    </div>

    <!-- Loading Overlay -->
    <div id="loadingOverlay" class="loading-overlay">
        <div class="spinner"></div>
    </div>

    <script>
        function orderFeedback() {
            return {
                rating: 0,
                tempRating: 0,
                feedback: '',
                isLoading: false,

                async submitFeedback() {
                    if (!this.rating) {
                        alert('Please select a rating');
                        return;
                    }

                    this.isLoading = true;
                    document.getElementById('loadingOverlay').classList.add('show');

                    try {
                        const response = await fetch('{{ route("order-feedback.submit") }}', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || '{{ csrf_token() }}',
                            },
                            body: JSON.stringify({
                                rating: this.rating,
                                feedback: this.feedback,
                            })
                        });

                        const data = await response.json();

                        if (data.success) {
                            // Show success message
                            document.getElementById('successMessage').classList.add('show');
                            
                            // Redirect to home after 2 seconds
                            setTimeout(() => {
                                window.location.href = '/home';
                            }, 2000);
                        } else {
                            alert('Failed to submit feedback. Please try again.');
                        }
                    } catch (error) {
                        console.error('Error:', error);
                        alert('An error occurred. Please try again.');
                    } finally {
                        this.isLoading = false;
                        document.getElementById('loadingOverlay').classList.remove('show');
                    }
                },

                skipFeedback() {
                    window.location.href = '/home';
                }
            };
        }
    </script>
</body>
</html>