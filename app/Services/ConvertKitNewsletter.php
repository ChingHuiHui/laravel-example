<?

namespace App\Services;

class ConvertKitNewsletter implements Newsletter
{
    public function __construct(protected ApiClient $clent)
    {
    }

    public function subscribe(string $email, string $list = null)
    {
    }
}
