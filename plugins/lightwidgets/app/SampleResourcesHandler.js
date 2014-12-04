/*
 * Copyright 2012 Amadeus s.a.s.
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *    http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

Aria.classDefinition({
    $classpath : "app.SampleResourcesHandler",
    $extends : "aria.resources.handlers.LCResourcesHandler",
    $constructor : function () {
        this.$LCResourcesHandler.$constructor.apply(this, arguments);
        this.setSuggestions([{
                    label : "Air France",
                    code : "AF"
                }, {
                    label : "Air France2",
                    code : "AF"
                }, {
                    label : "Air Canada",
                    code : "AC"
                }, {
                    label : "Finnair",
                    code : "XX"
                }, {
                    label : "Qantas",
                    code : "--"
                }, {
                    label : "American Airlines",
                    code : "AA"
                }, {
                    label : "Emirates",
                    code : "EK"
                }, {
                    label : "Scandinavian Airlines System",
                    code : "SK"
                }, {
                    label : "Scandinavian Airlines System2",
                    code : "SK"
                }]);
        this.codeExactMatch = true;
    }
});