<?php

namespace console\controllers;
use console\models\Referrals;
use console\models\Profit;
use yii\console\Controller;

class PartnerController extends Controller
{
    /**
     * Returns values from other functions
     * @param string $client_uid
     * @param string $dateTo
     * @return mixed
     */
    public function actionSend($client_uid, $dateTo)
    {
        $referrals = Referrals::mainFunction($client_uid);
        $profit = Profit::mainFunction($referrals['referrals']['referrals'], $dateTo);

        echo "Referrals Tree: ";
        print_r($referrals['tree']);
        echo "\n All referrals count: ";
        print_r($referrals['referrals']['allreferralscount']);
        echo "\n First level referrals: ";
        print_r($referrals['referrals']['firstlevelreferrals']);
        echo "\n Total levels referrals: ";
        print_r($referrals['referrals']['totallevelsreferrals']);
        echo "\n Profit: ";
        print_r($profit[0]['SUM(trades.profit)']);
        echo "\n Total volume: ";
        print_r($profit[0]['SUM(trades.volume * trades.coeff_h * trades.coeff_cr)']);
        die;
    }
}