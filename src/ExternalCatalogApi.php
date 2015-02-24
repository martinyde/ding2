<?php

namespace FBS;

use Reload\Prancer\SwaggerApi;
use FBS\Model;

class ExternalCatalogApi extends SwaggerApi
{

    /**
     * Get availability of bibliographical records.
     *
     *
     *  Returns an array of availability for each bibliographical record.
     *
     * @param string $agencyid ISIL of the agency (e.g. DK-761500)
     * @param array $recordid list of record ids
     */
    public function getAvailability($agencyid, $recordid = null)
    {
        $request = $this->newRequest("GET", "/external/v1/{agencyid}/catalog");
        $request->addParameter("path", "agencyid", $agencyid);
        $request->addParameter("query", "recordid", $recordid);

        $request->defineResponse(200, "", array('Availability'));
        $request->defineResponse("400", 'bad request', null);
        $request->defineResponse("401", 'client unauthorized', null);

        return $request->execute();
    }

    /**
     * Get placement holdings for bibliographical records.
     *
     *
     *  Returns an array of holdings for each bibliographical record.
     *  The holdings lists the materials on each placement, and whether they are available on-shelf or lent out.
     *
     * @param string $agencyid ISIL of the agency (e.g. DK-761500)
     * @param array $recordid Identifies the bibliographical records - OpenSearch: //searchresult/collection/object/identifier
     */
    public function getHoldings($agencyid, $recordid = null)
    {
        $request = $this->newRequest("GET", "/external/v1/{agencyid}/catalog");
        $request->addParameter("path", "agencyid", $agencyid);
        $request->addParameter("query", "recordid", $recordid);

        $request->defineResponse(200, "", array('HoldingsForBibliographicalRecord'));
        $request->defineResponse("400", 'bad request', null);
        $request->defineResponse("401", 'client unauthorized', null);

        return $request->execute();
    }


}

