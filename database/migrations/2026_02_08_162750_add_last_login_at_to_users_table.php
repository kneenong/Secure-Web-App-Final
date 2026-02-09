public function up()
{
    Schema::create('login_attempts', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('user_id')->nullable(); // null if unknown
        $table->string('email');
        $table->string('ip_address')->nullable();
        $table->boolean('successful')->default(false);
        $table->timestamps();
    });
}

public function down()
{
    Schema::dropIfExists('login_attempts');
}
