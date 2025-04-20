namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\UserModel;

class Login extends Controller
{
    public function index()
    {
        return view('auth/login');
    }

    public function authenticate()
    {
        $session = session();
        $model = new UserModel();
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        $user = $model->where('email', $email)->first();

        if($user && password_verify($password, $user['password'])) {
            $session->set([
                'id' => $user['id'],
                'email' => $user['email'],
                'logged_in' => true
            ]);
            return redirect()->to('/dashboard');
        } else {
            return redirect()->back()->with('error', 'Invalid credentials');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
