<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Model;
use App\Repositories\Users\UserInterface as UserInterface;
use Auth;
use App\User;
use Event;
use App\Events\WelComeEmail;

class UserService extends BaseService {

    protected $userInterface;

    public function __construct(UserInterface $userInterface) {
        $this->userInterface = $userInterface;
    }

    public function login(array $data) {
        return $this->userInterface->login($data);
    }

    public function register(array $data) {
        return $this->userInterface->register($data);
    }

    public function logout(array $data) {
        return $this->userInterface->logout($data);
    }

    public function changePassword(array $data) {
        return $this->userInterface->changePassword($data);
    }

    public function deleteAllToken(User $user) {
        return $this->userInterface->deleteAllToken($user);
    }

    public function findAll() {
        return $this->userInterface->findAll();
    }

    public function create(array $data) {
        return $this->userInterface->create($data);
    }

    public function update(array $data, $id) {
        return $this->userInterface->update($data, $id);
    }

    public function find($id) {
        return $this->userInterface->find($id);
    }

    public function destroy($id) {
        return $this->userInterface->destroy($id);
    }

    public function generatelinkToVerifyAccount() {
        return $this->userInterface->generatelinkToVerifyAccount();
    }

    public function checkAuthBooking() {
        return count(Auth::user()->getBookings);
    }

    public function checkAuthBookingStatus() {
        return Auth::user()->getBookings[0]->status;
    }

    public function verifyUserAccount($data) {
        $result = $this->userInterface->verifyUserAccount($data);
        if ($result)
            Event::fire(new WelComeEmail(Auth::user()));
        return $result;
    }

    public function approvedMechanic($id) {
        return $this->userInterface->approvedMechanic($id);
    }

    public function generateAccessToken(User $user) {
        return $this->userInterface->generateAccessToken($user);
    }

    public function addUser(array $input) {
        return $this->userInterface->addUser($input);
    }

    public function searchUser($input) {
        return $this->userInterface->searchUser($input);
    }

}
