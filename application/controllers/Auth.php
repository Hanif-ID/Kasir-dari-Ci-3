<?php 
class Auth Extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User');
    }

    public function index()
    {
        if ($this->input->post()) {
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $user = $this->User->login($username, $password);
            if ($user) {
                $this->session->set_userdata([
                    'user_id' => $user->id,
                    'username' => $user->username,
                ]);
                $this->session->set_flashdata('success', 'Anda Berhasil Login!');
                redirect('Beranda');
            } else {
                $this->session->set_flashdata('error', 'Gagal login, kemungkinan password atau username Anda salah!');
                redirect('auth');
            }
        }

        $data = [
            'title' => 'Login Kasir'
        ];

        $this->load->view('auth/header');
        $this->load->view('auth/login', $data);
        $this->load->view('auth/footer');
    }

    public function register()
    {
        if ($this->input->post()) {
            $data = [
                'username' => $this->input->post('username'),
                'email' => $this->input->post('email'),
                'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
            ];

            if ($this->User->register($data)) {
                $this->session->set_flashdata('success', 'Registrasi Berhasil');
                redirect('auth');
            } else {
                $this->session->set_flashdata('error', 'Gagal Register');
                redirect('auth/register');
            }
        }

        $data = [
            'title' => 'Register Kasir'
        ];

        $this->load->view('auth/header');
        $this->load->view('auth/register', $data);
        $this->load->view('auth/footer');
    }

    public function logout()
    {
        $this->session->unset_userdata('user_id');
        redirect('auth');
    }
}