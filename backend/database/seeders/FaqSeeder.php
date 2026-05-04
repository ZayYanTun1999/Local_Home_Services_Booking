<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Faq;

class FaqSeeder extends Seeder
{
    public function run(): void
    {
        echo "Seeding FAQs...\n";

        $faq_data = [
            ['question' => 'How do I book a service?', 'answer' => 'You can browse available services on our platform, choose your preferred professional, and book easily using real-time availability.', 'faq_order' => 1],
            ['question' => 'What is your cancellation policy?', 'answer' => 'You can cancel a booking up to 24 hours before the scheduled service without penalty. For late cancellations, a fee may apply.', 'faq_order' => 2],
            ['question' => 'How do I leave a review?', 'answer' => 'After your service is complete, you’ll receive a prompt to rate and review your experience. Your feedback helps us maintain quality.', 'faq_order' => 3],
            ['question' => 'Can I reschedule a booking?', 'answer' => 'Yes, you can reschedule your booking through your account dashboard or by contacting our support team.', 'faq_order' => 4],
            ['question' => 'Do I need to create an account to book services?', 'answer' => 'Yes, creating an account helps you manage bookings, track your service history, and leave reviews.', 'faq_order' => 5],
            ['question' => 'How are service providers verified?', 'answer' => 'All professionals are verified through ID checks, skill assessments, and community ratings to ensure reliability.', 'faq_order' => 6],
            ['question' => 'What payment methods do you accept?', 'answer' => 'We accept major credit/debit cards and digital wallet payments for your convenience and security.', 'faq_order' => 7],
            ['question' => 'Is there a customer support team available?', 'answer' => 'Yes, our support team is available 7 days a week to assist you with any booking or account queries.', 'faq_order' => 8],
            ['question' => 'Can I request the same service provider again?', 'answer' => 'Absolutely. You can request your preferred professional again when booking your next service.', 'faq_order' => 9],
            ['question' => 'What happens if the provider doesn\'t show up?', 'answer' => 'If a provider misses an appointment, contact our support team immediately for resolution or rebooking.', 'faq_order' => 10],
            ['question' => 'Are there any hidden fees?', 'answer' => 'No, we maintain transparent pricing. All charges are shown upfront before you confirm your booking.', 'faq_order' => 11],
            ['question' => 'Can I change my contact details after booking?', 'answer' => 'Yes, you can update your contact information from your account dashboard anytime.', 'faq_order' => 12],
            ['question' => 'Do you offer emergency services?', 'answer' => 'Yes, select providers offer emergency call-outs. Check the service details or contact support for urgent requests.', 'faq_order' => 13],
            ['question' => 'How soon can I get a service appointment?', 'answer' => 'Many services offer same-day or next-day appointments depending on availability.', 'faq_order' => 14],
            ['question' => 'Can I pay cash to the provider?', 'answer' => 'For security and record-keeping, all payments should be made through our platform.', 'faq_order' => 15],
            ['question' => 'Do you provide services on weekends?', 'answer' => 'Yes, most services are available on weekends. Check each provider’s availability when booking.', 'faq_order' => 16],
            ['question' => 'How do I become a service provider on your platform?', 'answer' => 'You can apply through our provider registration page. We will guide you through verification and onboarding.', 'faq_order' => 17],
            ['question' => 'Is my personal information secure?', 'answer' => 'Yes, we use industry-standard encryption and privacy measures to keep your data safe.', 'faq_order' => 18],
            ['question' => 'Can I book multiple services at once?', 'answer' => 'Yes, you can add multiple services to your booking schedule as needed.', 'faq_order' => 19],
            ['question' => 'Do you offer discounts for repeat customers?', 'answer' => 'We occasionally offer loyalty discounts and promotions. Subscribe to our newsletter to stay updated.', 'faq_order' => 20],
            ['question' => 'How do I contact customer support?', 'answer' => 'You can reach our support team via the Contact section on the website or through your account dashboard.', 'faq_order' => 21],
            ['question' => 'What areas do you serve?', 'answer' => 'We currently operate in multiple cities. Check the availability in your area during booking.', 'faq_order' => 22],
            ['question' => 'Can I tip the service provider?', 'answer' => 'Tips are optional and can be given directly to the provider after the service.', 'faq_order' => 23],
            ['question' => 'What if I am not satisfied with the service?', 'answer' => 'Please contact our support team immediately. We will review your concern and work towards a resolution.', 'faq_order' => 24],
        ];

        foreach ($faq_data as $faq) {
            Faq::updateOrCreate(
                ['question' => $faq['question']], // prevent duplicates
                $faq
            );
        }

        echo "FAQs seeded successfully.\n";
    }
}