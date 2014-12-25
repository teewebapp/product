<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InitialTables extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('products', function(Blueprint $table)
		{
			$table->increments('id');
			$table->decimal('price', 10,2);
			$table->string('name');
			$table->string('slug');
			$table->text('description');
			$table->text('text');
			$table->integer('stock')->nullable();
			$table->integer('weight')->nullable();

			$table->softDeletes();
			$table->timestamps();
		});

		Schema::create('product_images', function(Blueprint $table)
		{
			$table->increments('id');

			$table->unsignedInteger('product_id');
			$table->foreign('product_id')->references('id')->on('products');

			$table->string('name')->nullable();
			$table->string('description')->nullable();

			$table->string('image_file_name')->nullable();
			$table->integer('image_file_size')->nullable();
			$table->string('image_content_type')->nullable();
			$table->timestamp('image_updated_at')->nullable();

			$table->timestamps();
		});

		Schema::create('promotions', function(Blueprint $table)
		{
			$table->increments('id');

			$table->string('name');
			$table->unsignedInteger('global');
			$table->date('date_begin')->nullable();
			$table->date('date_end')->nullable();
			$table->decimal('discount', 10,2);
			$table->string('discount_type');

			$table->timestamps();
		});

		Schema::create('product_promotion', function(Blueprint $table)
		{
			$table->increments('id');

			$table->unsignedInteger('product_id');
			$table->foreign('product_id')->references('id')->on('products');

			$table->unsignedInteger('promotion_id');
			$table->foreign('promotion_id')->references('id')->on('promotions');

			$table->timestamps();
		});

		Schema::create('product_categories', function(Blueprint $table)
		{
			$table->increments('id');

			$table->string('name');
			$table->string('description');
			$table->unsignedInteger('category_id');
			$table->foreign('category_id')->references('id')->on('product_categories');

			$table->timestamps();
		});


		Schema::create('category_product', function(Blueprint $table)
		{
			$table->increments('id');

			$table->unsignedInteger('category_id');
			$table->foreign('category_id')->references('id')->on('product_categories');

			$table->unsignedInteger('product_id');
			$table->foreign('product_id')->references('id')->on('products');

			$table->timestamps();
		});

		Schema::create('product_attributes', function(Blueprint $table)
		{
			$table->increments('id');

			$table->unsignedInteger('product_id');
			$table->foreign('product_id')->references('id')->on('products');

			$table->string('name');
			$table->string('value')->nullable();
			$table->string('type');

			$table->timestamps();
		});

		Schema::create('product_attribute_options', function(Blueprint $table)
		{
			$table->increments('id');

			$table->unsignedInteger('product_attribute_id');
			$table->foreign('product_attribute_id')->references('id')->on('product_attributes');

			$table->string('value');
			$table->decimal('price_diff', 10,2)->nullable();
			$table->integer('weight_diff')->nullable();
			$table->integer('stock')->nullable();

			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('products');
		Schema::drop('product_images');
		Schema::drop('category_product');
		Schema::drop('product_categories');

		Schema::drop('product_promotion');
		Schema::drop('promotions');

		Schema::drop('product_attributes');
		Schema::drop('product_attribute_options');
	}

}
