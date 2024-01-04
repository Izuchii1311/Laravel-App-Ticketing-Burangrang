<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Ticket;
use App\Models\Transaction;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaction>
 */
class TransactionFactory extends Factory
{
    protected $model = \App\Models\Transaction::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $user = \App\Models\User::inRandomOrder()->first();
        $ticket = \App\Models\Ticket::inRandomOrder()->first();

        $amount = mt_rand(1,3);

        return [
            'user_id' => $user->id,
            'name_cashier' => $user->name,
            'ticket_id' => $ticket->id,
            'cd_ticket' => $ticket->cd_ticket,
            'name_ticket' => $ticket->name_ticket,
            'price' => $ticket->price,
            'amount' => $amount,
            'total' => $ticket->price * $amount,
            'cus_name' => $this->faker->name(),
            'cd_transaction' => 'KT-' . $this->faker->unique()->randomNumber(5, false),
            'description' => collect($this->faker->paragraphs(mt_rand(1, 3)))
                ->map(fn ($p) => "<p>$p</p>")
                ->implode(''),
            'transaction_date' => now(),
        ];
    }
}
