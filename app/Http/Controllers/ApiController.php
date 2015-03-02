<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Response;

class ApiController extends Controller {

    /**
     * @param $color
     * @return mixed
     */
    public function logoSvg($color) {
        $content = '<?xml version="1.0" encoding="UTF-8" standalone="no"?>
                <svg
                    xmlns:dc="http://purl.org/dc/elements/1.1/"
                    xmlns:cc="http://creativecommons.org/ns#"
                    xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"
                    xmlns:svg="http://www.w3.org/2000/svg"
                    xmlns="http://www.w3.org/2000/svg"
                    xmlns:sodipodi="http://sodipodi.sourceforge.net/DTD/sodipodi-0.dtd"
                    xmlns:inkscape="http://www.inkscape.org/namespaces/inkscape"
                    width="100%"
                    height="100%"
                    id="svg2"
                    version="1.1"
                    inkscape:version="0.48.5 r10040"
                    viewBox="0 0 489.1983 433.09552"
                    sodipodi:docname="UDS-logo.svg">
                    <defs
                        id="defs4" />
                    <sodipodi:namedview
                        id="base"
                        pagecolor="#ffffff"
                        bordercolor="#666666"
                        borderopacity="1.0"
                        inkscape:pageopacity="0"
                        inkscape:pageshadow="2"
                        inkscape:zoom="1.4"
                        inkscape:cx="236.88536"
                        inkscape:cy="212.73396"
                        inkscape:document-units="px"
                        inkscape:current-layer="layer1"
                        showgrid="false"
                        inkscape:window-width="1578"
                        inkscape:window-height="1027"
                        inkscape:window-x="1912"
                        inkscape:window-y="-8"
                        inkscape:window-maximized="1"
                        fit-margin-top="0"
                        fit-margin-left="0"
                        fit-margin-right="0"
                        fit-margin-bottom="0" />
                    <metadata
                        id="metadata7">
                        <rdf:RDF>
                            <cc:Work
                                rdf:about="">
                                <dc:format>image/svg+xml</dc:format>
                                <dc:type
                                    rdf:resource="http://purl.org/dc/dcmitype/StillImage" />
                                <dc:title></dc:title>
                            </cc:Work>
                        </rdf:RDF>
                    </metadata>
                    <g
                        inkscape:label="Layer 1"
                        inkscape:groupmode="layer"
                        id="layer1"
                        transform="translate(-114.9087,-144.69428)">
                        <g
                            id="g3782"
                            inkscape:export-filename="R:\Users\Chris\Pictures\logo-blk.png"
                            inkscape:export-xdpi="90"
                            inkscape:export-ydpi="90">
                            <path
                               transform="translate(5.7142857,5.8928572)"
                                sodipodi:open="true"
                                sodipodi:end="6.2685627"
                                sodipodi:start="0"
                                d="m 213.75001,272.54074 c 0,2.46556 -1.99873,4.46429 -4.46429,4.46429 -2.46556,0 -4.46429,-1.99873 -4.46429,-4.46429 0,-2.46556 1.99873,-4.46428 4.46429,-4.46428 2.4401,0 4.42813,1.95916 4.46381,4.399"
                                sodipodi:ry="4.4642859"
                                sodipodi:rx="4.4642859"
                                sodipodi:cy="272.54074"
                                sodipodi:cx="209.28572"
                                id="path3775"
                                style="fill:#' . $color .  ';fill-opacity:1;fill-rule:nonzero;stroke:none"
                                sodipodi:type="arc" />
                            <path
                                sodipodi:nodetypes="cscccssccssscssscscc"
                                inkscape:connector-curvature="0"
                                d="m 127.5,357.00504 c 0,0 13.81587,-4.16495 12.85715,-13.39286 -0.66201,-6.37197 -21.80553,0.57904 -21.80553,0.57904 z m 114.01786,-1.875 c 0,0 -70.24988,79.09023 -122.94644,-10.98214 -0.64608,-1.10433 33.36143,-14.99564 49.24084,-33.25776 39.8689,-45.85127 96.62324,-108.16895 96.62324,-108.16895 m -0.14979,-0.35901 c 0,0 70.62173,194.54374 254.28572,110 45,-20.71429 82.14286,-167.85714 82.85714,-165 0.71429,2.85714 -134.10196,212.35856 -113.57143,327.14286 15.71429,87.85714 99.28572,96.42857 99.28572,96.42857 0,0 -15.48078,17.70191 -67.66109,-19.47972 -29.63779,-21.11872 -71.82881,-88.34312 -85.19606,-120.52028 -18.39372,-44.27671 -69.82441,-39.53139 -86.38829,-39.38367 -95.09029,0.84803 -180.08559,95.10174 -225.75456,161.52653 0,0 -9.28571,16.42857 -1.42857,19.28571 7.85714,2.85715 105.71428,-84.28571 120.71428,-217.14286 0,0 66.42856,-60.71428 22.85714,-152.85714 z"
                                style="fill:none;stroke:#' . $color . ';stroke-width:5.30000019;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:4;stroke-opacity:1;stroke-dasharray:none"
                                id="path3777" />
                        </g>
                    </g>
                </svg>';
        $response = Response::make($content, 200);
        $response->header('Content-Type', 'image/svg+xml');
        return $response;
    }
}
