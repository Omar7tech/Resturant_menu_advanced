    <?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    return new class extends Migration
    {
        /**
         * Run the migrations.
         */
        public function up(): void
        {
            Schema::create('products', function (Blueprint $table) {
                $table->id();
                $table->string('name')->unique();
                $table->string('description')->nullable();
                $table->decimal('price', 8, 2)->nullable();
                $table->decimal('new_price', 8, 2)->nullable();
                $table->integer('preparation_time')->nullable(); // Time in minutes
                $table->integer('calories')->nullable();
                $table->string('slug')->nullable()->unique();
                $table->string('image_url')->nullable();
                $table->foreignId('category_id')->nullable()->constrained()->onDelete('cascade'); // Foreign key to categories
                $table->boolean('available')->default(true);
                $table->boolean('enabled')->default(true);
                $table->boolean('new')->default(false);
                $table->boolean('top_seller')->default(false);
                $table->boolean(column: 'featured')->default(false);
                $table->boolean('spicy')->default(false);
                $table->boolean( column: 'vegan')->default(false);
                $table->boolean('dairy_free')->default(false);
                $table->timestamps();
                $table->index('category_id');
            });
        }

        /**
         * Reverse the migrations.
         */
        public function down(): void
        {
            Schema::dropIfExists('products');
        }
    };
