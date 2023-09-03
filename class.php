class Customer
{
    protected $name;
    protected $birthday;

    public function __construct(string $name, string $birthday)
    {
        // Validar aqui???
        $this->name = $name;
        $this->birthday = $birthday;
    }
}
